@extends('plantilla')

@section('content')

<a href="{{route('productos.create')}}">
    <button>Agregar</button>
</a>

<h2>Productos</h2>

@if (session('mensaje'))
<div id="mensaje" class="alert alert-success">{{ session('mensaje') }}</div>
@endif

<table>
    <div class="table-responsive">
        <table class="table table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th colspan="2">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr class="">
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>
                        <form method="post" action="{{route ('productos.destroy', $producto)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Desea eliminar el producto?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>


                            </button>
                        </form>

                    </td>
                    <td>
                        <form method="get" action="{{route ('productos.edit', $producto)}}">



                            <button type="submit" class="btn btn-warning" onclick="mostrarVistaEdicion()">
                                <i class="fa-solid fa-edit"></i>
                            </button>


                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</table>

<script>
    // Esta función se ejecutará después de que la página se cargue completamente
    document.addEventListener('DOMContentLoaded', function () {
        // Si hay un mensaje presente, lo buscamos por su id
        var mensaje = document.getElementById('mensaje');
        if (mensaje) {
            // Mostramos el mensaje
            mensaje.style.display = 'block';
            // Después de 2 segundos, ocultamos el mensaje
            setTimeout(function () {
                mensaje.style.display = 'none';
            }, 2000);
        }
    });
</script>

<script>
    function mostrarVistaEdicion() {
        // Mostrar la vista de edición cambiando su estilo a display: block
        document.getElementById('vista-edicion').style.display = 'block';
    }
</script>

@endsection