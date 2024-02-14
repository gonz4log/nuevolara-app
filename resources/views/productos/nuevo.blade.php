@extends('plantilla')

@section('content')
<h2>Productos</h2>

<form action="{{ route('productos.store')}}" method="post" class="my-3 mx-auto p-4 text-center">
    @csrf
    Nombre <input type="text" name="nombre" class="form-control">
    Descripcion: <textarea name="descripcion" class="form-control"></textarea>
    Precio: <input type="number" name="precio" class="form-control my-2">

    <input type="submit" class="btn btn-danger" value="Guardar">
</form>
@endsection