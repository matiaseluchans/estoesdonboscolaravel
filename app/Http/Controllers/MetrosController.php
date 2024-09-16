<?php

namespace App\Http\Controllers;

use App\Models\Metro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;
use MercadoPago\Payer;

use App\Mail\TransactionStatusMail;
use Illuminate\Support\Facades\Mail;


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
    public function show(Producto $data)
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
    public function update(Request $request, Producto $data)
    {

        // Validar los datos
        $validatedData = $request->validate([

            'descripcion' => 'nullable|string|max:255',
            'nombre' => 'nullable|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'data' => 'nullable|string',
            'precio' => 'nullable|numeric',
            'estado' => 'required|string|max:255',
        ]);
        // Intentar actualizar el producto
        try {
            $data->update($validatedData);

            // Redirigir al index con un mensaje de éxito
            // return redirect()->route('metros.index')->with('success', 'Los datos se guardaron con éxito.');
            return response()->json([
                'success' => true,
                'message' => 'Operación exitosa. El producto ha sido actualizado.'
            ]);
        } catch (\Exception $e) {
            // Si ocurre algún error, redirigir a la vista de edición con un mensaje de error
            //return redirect()->route('metros.edit', $data->id)->with('error', 'Revisa tus datos. No pudimos actualizar la información.');
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar la compra: ' . $e->getMessage()
            ], 500);
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

    /*
    public function crearPago(Request $request, $id)
    {
        // Inicializar SDK de Mercado Pago
        SDK::setAccessToken(env('MERCADO_PAGO_ACCESS_TOKEN'));

        // Buscar el Metro
        $data = Metro::find($id);

        // Crear preferencia de pago
        $preference = new Preference();

        // Crear un item
        $item = new Item();
        $item->title = $data->descripcion;
        $item->quantity = 1;
        $item->unit_price = 30000; // Precio de $30000 por el M2

        $preference->items = [$item];

        // Payer (puedes usar los datos del formulario)
        $payer = new Payer();
        $payer->name = $request->input('nombre');
        $payer->surname = $request->input('apellido');
        $payer->email = $request->input('email');
        $payer->phone = [
            'number' => $request->input('telefono')
        ];
        $preference->payer = $payer;

        // URLs de retorno
        $preference->back_urls = [
            'success' => route('metros.success', ['id' => $id]),
            'failure' => route('metros.failure', ['id' => $id]),
            'pending' => route('metros.pending', ['id' => $id]),
        ];

        $preference->auto_return = 'approved';

        // Guardar preferencia
        $preference->save();

        return response()->json(['init_point' => $preference->init_point]);
    }

    // Método para manejar la respuesta exitosa
    public function success(Request $request, $id)
    {
        // Actualizar el estado del producto a 'VENDIDO'
        $data = Metro::find($id);
        $data->estado = 'VENDIDO';
        $data->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('metros.index')->with('success', 'Producto comprado exitosamente.');
    }*/

    public function __construct()
    {
        SDK::setAccessToken(config('services.mercado_pago.access_token'));
    }


    public function createPayment(Request $request, $id)
    {
        $data = Metro::findOrFail($id);
        $preference = new Preference();

        // Crear el objeto de item
        $item = new \MercadoPago\Item();
        $item->title = $data->descripcion;
        $item->quantity = 1;
        $item->unit_price = $data->precio;
        //$item->unit_price = 1;
        $preference->items = [$item];

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
            'telefono' => $request->input('telefono')
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

        // Retornar el init_point de Mercado Pago
        return response()->json(['init_point' => $preference->init_point]);
    }

    public function success(Request $request, $id)
    {
        // Log para verificar la información que llega de Mercado Pago
        //$logrequests = "mercadopago datos request : " . json_encode($request->all(), true);
        //Log::info($logrequests);

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

        // Si la transacción fue aprobada, actualiza el estado del producto
        if ($payment_status == 'approved') {
            $data->estado = 'VENDIDO';
            $data->nombre = $nombre;
            $data->apellido = $apellido;
            $data->email = $email;
            $data->telefono = $telefono;

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
        }

        // Datos para enviar en el correo
        $data = [
            'status' => $payment_status,
            'payment_id' => $payment_id,
            'id' => $id,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono
        ];

        // Enviar correo a los 3 contactos
        //$contacts = ['contacto1@example.com', 'contacto2@example.com', 'contacto3@example.com'];
        /*$contacts = ['matiaseluchans@gmail.com', 'proyecto11desintetico@gmail.com', $email];

        foreach ($contacts as $contact) {
            Mail::to($contact)->send(new TransactionStatusMail($data));
        }*/

        Mail::to('proyecto11desintetico@gmail.com')
            ->cc(['matiaseluchans@gmail.com', $email])
            ->send(new TransactionStatusMail($data));


        // Redirige a la página principal con un mensaje de éxito
        return redirect()->route('metros.index')->with('success', '¡La compra del Metro N° ' . $id . ' se realizó con éxito!');
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



        // Datos para enviar en el correo
        $data = [
            'status' => $payment_status,
            'payment_id' => $payment_id,
            'id' => $id,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono
        ];

        // Enviar correo a los 3 contactos
        Mail::to('proyecto11desintetico@gmail.com')
            ->cc(['matiaseluchans@gmail.com', $email])
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



        // Datos para enviar en el correo
        $data = [
            'status' => $payment_status,
            'payment_id' => $payment_id,
            'id' => $id,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono
        ];

        // Enviar correo a los 3 contactos
        //$contacts = ['contacto1@example.com', 'contacto2@example.com', 'contacto3@example.com'];
        Mail::to('proyecto11desintetico@gmail.com')
            ->cc(['matiaseluchans@gmail.com', $email])
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


        // Recuperar la metadata que enviaste en la preferencia
        $nombre = "Esto es una prueba";
        $apellido = "Gonzalez";
        $email = "prueba@gmail.com";
        $telefono = "12345678";



        // Datos para enviar en el correo
        $data = [
            'status' => "mail de prueba",
            'payment_id' => "xxx",
            'id' => 1,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'telefono' => $telefono
        ];

        Mail::to('matiaseluchans@gmail.com')
            ->send(new TransactionStatusMail($data));
    }
}
