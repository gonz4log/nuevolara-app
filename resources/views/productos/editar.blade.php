<!-- Vista de edición -->
@extends('plantilla')

@section('content')
<h2>Editar Producto</h2>

<form action="{{ route('productos.update', $producto)}}" method="post" class="my-3 mx-auto p-4 text-center">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$producto->id}}">
    Nombre <input type="text" name="nombre" class="form-control" value="{{$producto->nombre}}">
    Descripcion: <textarea name="descripcion" class="form-control">{{$producto->descripcion}}</textarea>
    Precio: <input type="text" name="precio" class="form-control my-2" value="{{$producto->precio}}">

    <input type="submit" class="btn btn-danger" value="Guardar">
</form>
@endsection