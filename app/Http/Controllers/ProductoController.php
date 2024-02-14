<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    function index()
    {
        $productos = Producto::get();
        return view('productos.index', ['productos' => $productos]);
    }


    function destroy(Producto $producto)
    {
        $producto->delete();
        return back();
    }



    function create()
    {
        return view('productos.nuevo');
    }


    function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);

        $producto = Producto::create($datos);
        return redirect('productos')->with('mensaje', 'Agregado');
    }







    function edit(Producto $producto)
    {
        return view('productos.editar', ['producto' => $producto]);
    }


    function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());
        return redirect('productos')->with('mensaje', 'producto actualizado');
    }
}
