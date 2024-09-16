<?php

namespace App\Http\Controllers;

use App\Models\Metro;
use Illuminate\Http\Request;

use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;

class CompraController extends Controller
{
    public function generarPago($id)
    {
        // Inicializa el SDK de Mercado Pago con tus credenciales
        SDK::setAccessToken(env('MERCADO_PAGO_ACCESS_TOKEN'));

        // Busca el producto por ID
        $producto = Producto::findOrFail($id);

        // Crea un objeto Item para Mercado Pago
        $item = new Item();
        $item->title = $producto->descripcion;
        $item->quantity = 1;
        $item->unit_price = 1; // El precio que mencionaste

        // Crea la preferencia de pago
        $preference = new Preference();
        $preference->items = [$item];
        $preference->external_reference = $producto->id; // Asocia la compra con el producto

        // URLs para el manejo del pago
        $preference->back_urls = [
            'success' => route('compras.success', $producto->id),
            'failure' => route('compras.failure', $producto->id),
            'pending' => route('compras.pending', $producto->id),
        ];

        $preference->auto_return = 'approved'; // Automáticamente regresa si el pago es aprobado
        $preference->save();

        // Redirige al usuario al botón de pago
        return view('productos.pago', compact('preference'));
    }

    // Método para recibir la respuesta del pago
    public function pagoSuccess($id, Request $request)
    {
        // Obtener el producto
        $producto = Producto::findOrFail($id);

        // Verifica la transacción y actualiza el producto si es exitoso
        if ($request->status == 'approved') {
            $producto->estado = 'VENDIDO';
            $producto->nombre = $request->nombre;
            $producto->apellido = $request->apellido;
            $producto->email = $request->email;
            $producto->telefono = $request->telefono;
            $producto->save();

            return redirect()->route('productos.index')->with('success', 'Compra realizada con éxito.');
        }

        return redirect()->route('productos.index')->with('error', 'Ocurrió un error en la compra.');
    }
}
