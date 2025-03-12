<?php

namespace App\Http\Controllers;

use App\Exports\MetrosVendidosPublic;
use App\Models\Metro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;
use MercadoPago\Payer;

use App\Mail\TransactionStatusMail;
use Illuminate\Support\Facades\Mail;


use function GuzzleHttp\json_encode;


use App\Exports\MetrosVendidosExport;
use Maatwebsite\Excel\Facades\Excel;


class MetrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los productos
        $data = Metro::orderByRaw('estado = "DISPONIBLE" DESC')
            ->orderBy('id')
            ->get();

        $cantidadTotal = $data->count();
        $cantidadVendidos = $data->where('estado', 'VENDIDO')->count();
        $cantidadDisponibles = $cantidadTotal - $cantidadVendidos;

        $porcentajeVendidos = ($cantidadVendidos / $cantidadTotal) * 100;

        // Pasamos las variables a la vista
        // return view('metros.index', compact('cantidadVendidos', 'cantidadDisponibles', 'porcentajeVendidos'));
        return view('metros.index', [
            'data' => $data,
            'cantidadVendidos' => $cantidadVendidos,
            'cantidadDisponibles' => $cantidadDisponibles,
            'porcentajeVendidos' => $porcentajeVendidos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Si tienes una vista para crear productos
        return view('metros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'descripcion' => 'required|string|max:255',

            'nombre' => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'data' => 'nullable|string',
            'precio' => 'nullable|numeric',
            'estado' => 'required|string|max:255',
        ]);

        // Crear el producto
        $data = Metro::create($validatedData);

        return response()->json(['message' => 'Producto creado con éxito', 'producto' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Metro  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Metro $data)
    {
        // Mostrar un producto específico
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Metro  $data
     * @return \Illuminate\Http\Response
     */
    /*    public function edit(Producto $data)
    {
        // Si tienes una vista para editar productos
        return view('metros.edit', compact('producto'));
    }
*/

    public function edit($id)
    {
        $data = Metro::find($id);

        return response()->json($data); // Devuelve los datos del producto en formato JSON
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Metro  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Validar los datos
        $validatedData = $request->validate([

            //'descripcion' => 'nullable|string|max:255',
            'nombre' => 'nullable|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:20',

        ]);
        // Intentar actualizar el producto
        try {

            $d = Metro::findOrFail($id);

            $validatedData['estado'] = 'VENDIDO';
            $validatedData['data'] =
                json_encode([
                    "payment_id" => "Pago manual",
                    "status" => "Pago efectivo",
                    'nombre' => $validatedData['nombre'],
                    'apellido' => $validatedData['apellido'],
                    'email ' =>  $validatedData['email'],
                    'telefono' => $validatedData['telefono'],
                    "payment_method" => "pago manual"
                ]);



            $d->update($validatedData);
            $d->save();
            $data = Metro::findOrFail($id);

            // Recuperar la metadata que enviaste en la preferencia
            $nombre = $data->nombre;
            $apellido = $data->apellido;
            $email = $data->email;
            $telefono = $data->telefono;
            $descripcion = $data->descripcion;
            $dataMp = json_decode($data->data);



            // Datos para enviar en el correo
            $data = [
                'status' => $dataMp->status,
                'payment_id' => $dataMp->payment_id,
                'id' => $data->id,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'telefono' => $telefono,
                'descripcion' => $descripcion,
            ];

            Log::info(json_encode($data));

            Mail::to($email)
                ->cc(['proyecto11desintetico@gmail.com', 'matiaseluchans@gmail.com'])
                ->send(new TransactionStatusMail($data));


            return redirect()->route('metros.vendidos')->with('success', 'Los datos se guardaron con éxito.');
        } catch (\Exception $e) {

            return redirect()->route('metros.vendidos', $data->id)
                ->with('error', 'Revisa tus datos. No pudimos actualizar la información.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Metro  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metro $data)
    {
        // Eliminar el Metro (soft delete)
        //$data->delete();

        return response()->json(['message' => 'Producto eliminado con éxito']);
    }



    public function __construct()
    {
        SDK::setAccessToken(config('services.mercado_pago.access_token'));
    }


    public function createPayment(Request $request, $id)
    {

        $validatedData = $request->validate([

            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',

        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'Por favor, introduce una dirección de correo electrónico válida.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
        ]);


        //$data = Metro::findOrFail($id);

        $tipo_rifa = $id;




        $data = Metro::where('estado', '=', 'DISPONIBLE')
            ->where("tipo_rifa", '=', $tipo_rifa)
            ->first();

        $preference = new Preference();

        // Crear el objeto de item
        $item = new \MercadoPago\Item();
        //$item->title = "Compra de Metro de Cesped " . $data->descripcion;
        $item->title = "Compra de Metro de Cesped " . $request->input('email');
        $item->quantity = 1;
        $item->unit_price = $data->precio;
        //$item->unit_price = 1;
        $preference->items = [$item];

        $preference->notification_url = route('webhook.mercadopago');

        Log::info(route('webhook.mercadopago'));
        // Crear el objeto de payer (comprador) con los datos del formulario
        /*$logrequests = "mercadopago datos request : " . json_encode($request->all(), true);

        Log::info($logrequests);
        */

        $payer = new \MercadoPago\Payer();
        $payer->name = $request->input('nombre');
        $payer->surname = $request->input('apellido');
        $payer->email = $request->input('email');
        $payer->phone = [
            "area_code" => "", // Opcional
            "number" => $request->input('telefono')
        ];
        $preference->payer = $payer;

        // Opcional: Guardar los datos en metadata (para referencia adicional)
        $preference->metadata = [
            'producto_id' => $data->id,
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'descripcion' => $data->descripcion,
            'tipo_rifa' => $data->tipo_rifa
        ];

        // Configuración de las URLs de retorno
        $preference->back_urls = [
            "success" => route('metros.success', $id),
            "failure" => route('metros.failure', $id),
            "pending" => route('metros.pending', $id)
        ];
        $preference->auto_return = "approved";

        // Guardar la preferencia
        $preference->save();

        Log::info("preference.metadata");
        Log::info(json_encode($preference->metadata));

        // Retornar el init_point de Mercado Pago
        return response()->json(['init_point' => $preference->init_point]);
    }

    public function success(Request $request, $id)
    {
        // Log para verificar la información que llega de Mercado Pago
        //$logrequests = "mercadopago datos request : " . json_encode($request->all(), true);
        //Log::info($logrequests);
        Log::info("success recibido");
        // Obtén el producto
        $data = Metro::findOrFail($id);

        // Verifica la información de la transacción desde el request
        $payment_status = $request->input('status'); // Estado del pago
        $payment_id = $request->input('payment_id'); // ID del pago

        // Verifica la transacción a través de la API de Mercado Pago
        $payment = \MercadoPago\Payment::find_by_id($payment_id);

        // Recuperar la metadata desde la respuesta de la API de Mercado Pago
        $metadata = $payment->metadata;

        $payment_method = $request->input('payment_type'); // Tipo de pago (opcional)
        $merchant_order_id = $request->input('merchant_order_id'); // Orden de pago (opcional)

        // Recuperar la metadata que enviaste en la preferencia
        $nombre = $metadata->nombre;
        $apellido = $metadata->apellido;
        $email = $metadata->email;
        $telefono = $metadata->telefono;
        $descripcion = $metadata->descripcion;

        // Si la transacción fue aprobada, actualiza el estado del producto
        /*if ($payment_status == 'approved') {

            Log::info("Pago aprobado. Procesando actualización del producto.");

            if ($data->estado == "DISPONIBLE") {

                $data->estado = 'VENDIDO';
                $data->nombre = $nombre;
                $data->apellido = $apellido;
                $data->email = $email;
                $data->telefono = $telefono;
                //$data->descripcion = $descripcion;

                // Almacena la información de la transacción en el campo "data"
                $data->data = json_encode([
                    'payment_id' => $payment_id,
                    'status' => $payment_status,
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'email' => $email,
                    'telefono' => $telefono,
                    'payment_method' => $payment_method, // Agrega el tipo de pago si es relevante
                    'merchant_order_id' => $merchant_order_id // ID de la orden (opcional)
                ]);

                // Guarda los cambios en la base de datos
                $data->save();
                Log::info("Producto actualizado correctamente. ID del producto: $id");


                // Datos para enviar en el correo
                $data = [
                    'status' => $payment_status,
                    'payment_id' => $payment_id,
                    'id' => $id,
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'email' => $email,
                    'telefono' => $telefono,
                    'descripcion' => $descripcion
                ];

                // Enviar correo a los 3 contactos
                //$contacts = ['contacto1@example.com', 'contacto2@example.com', 'contacto3@example.com'];
                //$contacts = ['matiaseluchans@gmail.com', 'proyecto11desintetico@gmail.com', $email];

                //foreach ($contacts as $contact) {
                //    Mail::to($contact)->send(new TransactionStatusMail($data));
                //}

                Mail::to('proyecto11desintetico@gmail.com')
                    ->cc(['matiaseluchans@gmail.com', $email])
                    ->send(new TransactionStatusMail($data));
                Log::info("Correo enviado a contactos.");
            } else {
                Log::info("Producto ya se actualizo y el correo fue enviado anteriormente. ID del producto: $id");
            }
        } else {
            // Si el estado del pago no es 'approved', registrar un log con el estado
            Log::warning("El pago no fue aprobado. Estado: {$payment->status}");
            Log::info("Datos del cliente: Nombre: {$nombre}, Email: {$email}, telefono: {$telefono}");
        }

        // Redirige a la página principal con un mensaje de éxito
        return redirect()->route('metros.index')->with('success', '¡La compra del Metro N° ' . $id . ' se realizó con éxito!');
        */
        return redirect()->route('metros.index')->with('success', '¡La compra del Metro se realizó con éxito!');
    }


    public function failure(Request $request, $id)
    {
        //$data = Metro::findOrFail($id);

        // Verifica la información de la transacción desde el request
        $payment_status = $request->input('status'); // Estado del pago
        $payment_id = $request->input('payment_id'); // ID del pago

        // Verifica la transacción a través de la API de Mercado Pago
        $payment = \MercadoPago\Payment::find_by_id($payment_id);

        // Recuperar la metadata desde la respuesta de la API de Mercado Pago
        $metadata = $payment->metadata;

        $payment_method = $request->input('payment_type'); // Tipo de pago (opcional)
        $merchant_order_id = $request->input('merchant_order_id'); // Orden de pago (opcional)

        // Recuperar la metadata que enviaste en la preferencia
        $nombre = $metadata->nombre;
        $apellido = $metadata->apellido;
        $email = $metadata->email;
        $telefono = $metadata->telefono;
        $descripcion = $metadata->descripcion;



        // Datos para enviar en el correo
        $data = [
            'status' => $payment_status,
            'payment_id' => $payment_id,
            'id' => $id,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono,
            'descripcion' => $descripcion,

        ];

        // Enviar correo a los 3 contactos
        Mail::to('proyecto11desintetico@gmail.com')
            ->cc(['matiaseluchans@gmail.com'])
            ->send(new TransactionStatusMail($data));


        // Mensaje de fallo en la sesión
        return redirect()->route('metros.index')->with('error', 'La compra del Metro N° ' . $id . ' no se pudo completarse. Inténtalo nuevamente.');
    }

    public function pending(Request $request, $id)
    {

        //$data = Metro::findOrFail($id);

        // Verifica la información de la transacción desde el request
        $payment_status = $request->input('status'); // Estado del pago
        $payment_id = $request->input('payment_id'); // ID del pago

        // Verifica la transacción a través de la API de Mercado Pago
        $payment = \MercadoPago\Payment::find_by_id($payment_id);

        // Recuperar la metadata desde la respuesta de la API de Mercado Pago
        $metadata = $payment->metadata;

        $payment_method = $request->input('payment_type'); // Tipo de pago (opcional)
        $merchant_order_id = $request->input('merchant_order_id'); // Orden de pago (opcional)

        // Recuperar la metadata que enviaste en la preferencia
        $nombre = $metadata->nombre;
        $apellido = $metadata->apellido;
        $email = $metadata->email;
        $telefono = $metadata->telefono;
        $descripcion = $metadata->descripcion;



        // Datos para enviar en el correo
        $data = [
            'status' => $payment_status,
            'payment_id' => $payment_id,
            'id' => $id,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono,
            'descripcion' => $descripcion
        ];

        // Enviar correo a los 3 contactos
        //$contacts = ['contacto1@example.com', 'contacto2@example.com', 'contacto3@example.com'];
        Mail::to('proyecto11desintetico@gmail.com')
            ->cc(['matiaseluchans@gmail.com'])
            ->send(new TransactionStatusMail($data));

        // Mensaje de pendiente en la sesión
        return redirect()->route('metros.index')->with('info', 'La compra del Metro N° ' . $id . ' está pendiente. Espera la confirmación.');
    }

    public function handleNotification($id, Request $request)
    {
        // Aquí puedes manejar la notificación de Mercado Pago y registrar el estado del pago
        // Por ejemplo, actualizar el estado del producto y guardar la información del pago

        // Ejemplo de actualización del producto
        $data = Metro::findOrFail($id);
        $data->estado = 'VENDIDO';
        $data->save();

        // Redirige al usuario a la página deseada
        return redirect()->route('home')->with('success', 'Compra registrada exitosamente.');
    }

    public function mailTest(Request $request)
    {

        $data = Metro::findOrFail(1);
        // Recuperar la metadata que enviaste en la preferencia
        /* $nombre = "Esto es una prueba";
        $apellido = "Gonzalez";
        $email = "prueba@gmail.com";
        $telefono = "12345678";
        $descripcion = "prueba";
        */
        $nombre = $data->nombre;
        $apellido = $data->apellido;
        $email = $data->email;
        $telefono = $data->telefono;
        $descripcion = $data->descripcion;



        // Datos para enviar en el correo
        $data = [
            'status' => "mail de prueba",
            'payment_id' => "xxx",
            'id' => 1,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono,
            'descripcion' => $descripcion,
        ];

        Mail::to('matiaseluchans@gmail.com')
            ->send(new TransactionStatusMail($data));
    }


    public function handleWebhook(Request $request)
    {
        // Obtener los datos de la notificación
        $notification = $request->all();

        Log::info("Webhook recibido");
        Log::info(json_encode($notification));

        // Verificar que sea una notificación de tipo "payment"
        if (isset($notification['type'])) {
            if ($notification['type'] == 'payment') {
                Log::info("Notificación de pago recibida.");

                // Obtener la información del pago desde MercadoPago usando el ID del pago
                $paymentId = $notification['data']['id'];

                $prodDB = Metro::WhereRaw("JSON_EXTRACT(data, '$.payment_id') LIKE '%" . $paymentId . "%'")->first();

                if ($prodDB) {
                    Log::info("Producto ya actualizado previamente para este pago. ID del producto: $prodDB->id,  ID del pago: $paymentId");
                    return response()->json(['status' => 'success', 'message' => 'Pago ya procesado'], 200);
                } else {
                    $payment = \MercadoPago\Payment::find_by_id($paymentId);

                    if ($payment) {
                        Log::info("Pago encontrado. ID: $paymentId, Estado: {$payment->status}");

                        // Verificar si el pago fue acreditado
                        if ($payment->status == 'approved') {
                            Log::info("Pago aprobado. Procesando actualización del producto.");

                            // Obtener el ID del producto desde la metadata del pago
                            /*
                            $productoId = $payment->metadata->producto_id;
                            $producto = Metro::findOrFail($productoId);
                            */
                            $producto = Metro::where('estado', '=', 'DISPONIBLE')
                                ->where("tipo_rifa", '=', $payment->metadata->tipo_rifa)
                                ->first();

                            $productoId = $producto->id;

                            if ($producto->estado == "DISPONIBLE") {
                                // Actualizar el estado del producto a 'VENDIDO'
                                $producto->estado = 'VENDIDO';
                                $producto->nombre = $payment->metadata->nombre;
                                $producto->apellido = $payment->metadata->apellido;
                                $producto->email = $payment->metadata->email;
                                $producto->telefono = $payment->metadata->telefono;

                                $producto->data = json_encode([
                                    'payment_id' => $payment->id,
                                    'status' => $payment->status,
                                    'nombre' => $payment->metadata->nombre,
                                    'apellido' => $payment->metadata->apellido,
                                    'email' => $payment->metadata->email,
                                    'telefono' => $payment->metadata->telefono,
                                    'payment_method' => $payment->payment_method_id,
                                    //'merchant_order_id' => $payment->merchant_order_id
                                ]);
                                Log::info("producto->data");
                                Log::info(json_encode($producto->data));
                                // Guardar cambios en la base de datos
                                $producto->save();
                                Log::info("Producto actualizado correctamente. ID del producto: $productoId");

                                // Preparar los datos para enviar por correo electrónico
                                $data = [
                                    'status' => $payment->status,
                                    'payment_id' => $payment->id,
                                    'id' => $productoId,
                                    'nombre' => $payment->metadata->nombre,
                                    'apellido' => $payment->metadata->apellido,
                                    'email' => $payment->metadata->email,
                                    'telefono' => $payment->metadata->telefono,
                                    'descripcion' => $producto->descripcion,
                                    'tipo_rifa' => $producto->tipo_rifa
                                ];

                                // Enviar correos a los contactos


                                Mail::to($payment->metadata->email)
                                    ->cc(['proyecto11desintetico@gmail.com', 'matiaseluchans@gmail.com'])
                                    ->send(new TransactionStatusMail($data));

                                Log::info("Correo enviado a contactos.");
                                return response()->json(['status' => 'success', 'message' => 'Pago procesado'], 200);
                            } else {
                                Log::info("Producto ya se actualizo y el correo fue enviado anteriormente. ID del producto: $productoId");
                            }
                        } else {
                            // Si el estado del pago no es 'approved', registrar un log con el estado
                            Log::warning("El pago no fue aprobado. Estado: {$payment->status}");
                            Log::info("Datos del cliente: Nombre: {$payment->metadata->nombre}, Email: {$payment->metadata->email}");
                        }
                    } else {
                        // Si no se encuentra el pago, registrar un log de error
                        Log::error("No se pudo encontrar el pago con ID: $paymentId");
                    }
                }
            } else {
                // Si no es una notificación de pago, registrar el tipo de notificación recibido
                Log::warning("Notificación recibida no es de tipo 'payment'. Tipo: {$notification['type']}");
            }
        } else {
            // Si no es una notificación de pago, registrar el tipo de notificación recibido
            Log::warning("Notificación recibida no es de tipo 'payment'. Tipo: " . json_encode($notification));
        }

        // Responder a Mercado Pago para confirmar la recepción de la notificación
        return response()->json(['status' => 'success'], 200);
    }


    public function vendidos()
    {
        // Obtener todos los productos
        $data = Metro::orderByRaw('estado = "VENDIDOS" DESC')
            ->orderBy('id')
            ->get();

        $cantidadTotal = $data->count();
        $cantidadVendidos = $data->where('estado', 'VENDIDO')->count();
        $cantidadDisponibles = $cantidadTotal - $cantidadVendidos;

        $porcentajeVendidos = ($cantidadVendidos / $cantidadTotal) * 100;

        // Pasamos las variables a la vista
        // return view('metros.index', compact('cantidadVendidos', 'cantidadDisponibles', 'porcentajeVendidos'));
        return view('metros.vendidos', [
            'data' => $data,
            'cantidadVendidos' => $cantidadVendidos,
            'cantidadDisponibles' => $cantidadDisponibles,
            'porcentajeVendidos' => $porcentajeVendidos,
        ]);
    }



    public function mailresend(Request $request, $id)
    {
        $data = Metro::findOrFail($id);

        // Recuperar la metadata que enviaste en la preferencia
        $nombre = $data->nombre;
        $apellido = $data->apellido;
        $email = $data->email;
        $telefono = $data->telefono;
        $descripcion = $data->descripcion;
        $dataMp = json_decode($data->data);



        // Datos para enviar en el correo
        $data = [
            'status' => $dataMp->status,
            'payment_id' => $dataMp->payment_id,
            'id' => $data->id,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono,
            'descripcion' => $descripcion,
        ];

        Mail::to($email)
            ->cc(['proyecto11desintetico@gmail.com', 'matiaseluchans@gmail.com'])
            ->send(new TransactionStatusMail($data));
    }



    public function consultapago(Request $request, $paymentId)
    {

        $prodDB = Metro::WhereRaw("JSON_EXTRACT(data, '$.payment_id') LIKE '%" . $paymentId . "%'")->first();

        if ($prodDB) {
            Log::info("Producto ya actualizado previamente para este pago. ID del producto: $prodDB->id,  ID del pago: $paymentId");
            return response()->json(['status' => 'success', 'message' => 'Pago ya procesado'], 200);
        } else {
            return response()->json(['status' => 'success', 'message' => 'Pago sin procesar'], 200);
        }
    }


    public function vendidospublic()
    {
        // Obtener todos los productos
        $data = Metro::where('estado', 'VENDIDO')
            ->orderBy('id')
            ->get();

        $cantidadVendidos = $data->count();
        $cantidadTotal = Metro::count();
        $cantidadDisponibles = $cantidadTotal - $cantidadVendidos;

        $porcentajeVendidos = ($cantidadVendidos / $cantidadTotal) * 100;

        // Pasamos las variables a la vista
        // return view('metros.index', compact('cantidadVendidos', 'cantidadDisponibles', 'porcentajeVendidos'));

        foreach ($data as $k => $v) {
            $data[$k]["emailoculto"] = mostrarPrimerosDigitos($data[$k]["email"], 6);
            $data[$k]["telefonooculto"] = mostrarUltimosDigitos($data[$k]["telefono"], 4);
        }
        return view('metros.vendidospublic', [
            'data' => $data,
            'cantidadVendidos' => $cantidadVendidos,
            'cantidadDisponibles' => $cantidadDisponibles,
            'porcentajeVendidos' => $porcentajeVendidos,
        ]);
    }

    public function vendidosexport()
    {
        // Query específica: por ejemplo, solo productos disponibles
        $data = Metro::select('descripcion', 'nombre', 'apellido')
            ->where('estado', 'VENDIDO')
            ->orderBy('id')
            ->get();

        /*foreach ($data as $k => $v) {
            $data[$k]["emailoculto"] = mostrarPrimerosDigitos($data[$k]["email"], 6);
            unset($data[$k]["email"]);
            $data[$k]["telefonooculto"] = mostrarUltimosDigitos($data[$k]["telefono"], 4);
            unset($data[$k]["telefono"]);
        }*/
        //$html = View::make('metros.exportsvendidospublic', compact('data'))->render();

        $fileName = 'metros_vendidos_' . date("d-m-Y") . '.xlsx';

        return Excel::download(new MetrosVendidosExport($data), $fileName);
    }
}




function mostrarUltimosDigitos($texto, $num)
{
    $longitud = strlen($texto);

    if ($longitud <= $num) {
        return $texto; // Si tiene 6 o menos, mostramos todo
    }

    $oculto = str_repeat('*', $longitud - $num); // Asteriscos según la longitud menos los últimos 6
    $visible = substr($texto, -$num); // Últimos 6 caracteres
    return $oculto . $visible;
}
function mostrarPrimerosDigitos($texto, $num)
{
    $longitud = strlen($texto);

    if ($longitud <= $num) {
        return $texto; // Si la longitud es menor o igual a $num, mostramos todo el texto
    }

    $visible = substr($texto, 0, $num); // Primeros N caracteres
    $oculto = str_repeat('*', $longitud - $num); // Asteriscos para el resto
    return $visible . $oculto;
}
