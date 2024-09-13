<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los productos
        $productos = Producto::all();

        //$productos = Producto::paginate(15);

        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Si tienes una vista para crear productos
        return view('productos.create');
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
        $producto = Producto::create($validatedData);

        return response()->json(['message' => 'Producto creado con éxito', 'producto' => $producto]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        // Mostrar un producto específico
        return response()->json($producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    /*    public function edit(Producto $producto)
    {
        // Si tienes una vista para editar productos
        return view('productos.edit', compact('producto'));
    }
*/

    public function edit($id)
    {
        $producto = Producto::find($id);

        return response()->json($producto); // Devuelve los datos del producto en formato JSON
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
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
            $producto->update($validatedData);

            // Redirigir al index con un mensaje de éxito
            // return redirect()->route('productos.index')->with('success', 'Los datos se guardaron con éxito.');
            return response()->json([
                'success' => true,
                'message' => 'Operación exitosa. El producto ha sido actualizado.'
            ]);
        } catch (\Exception $e) {
            // Si ocurre algún error, redirigir a la vista de edición con un mensaje de error
            //return redirect()->route('productos.edit', $producto->id)->with('error', 'Revisa tus datos. No pudimos actualizar la información.');
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar la compra: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        // Eliminar el producto (soft delete)
        $producto->delete();

        return response()->json(['message' => 'Producto eliminado con éxito']);
    }
}
