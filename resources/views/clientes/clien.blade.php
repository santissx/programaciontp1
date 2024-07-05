@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <h1>Lista de clientes</h1>

    @if (session("correcto"))
    <div class="alert alert-success">{{session("correcto")}}</div>
    @endif
    @if (session("incorrecto"))
    <div class="alert alert-danger">{{session("incorrecto")}}</div>
    @endif
    <script>
        var preg = function() { var not = confirm("estas seguro de eliminar?");
        return not; }; 
    </script>

    <div class="p-5 table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <!-- Botón para abrir el modal de agregar cliente -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#agregarClienteModal">
                Agregar
            </button>
            
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>DNI</th>
                    <th>Cuit</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $item)
                <tr>
                    <td>{{ $item->id_cliente }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->apellido }}</td>
                    <td>{{ $item->direccion }}</td>
                    <td>{{ $item->dni }}</td>
                    <td>{{ $item->cuit }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modificarClienteModal{{ $item->id_cliente }}">Modificar</button>
                        <a href="{{route('clientes.delete', $item->id_cliente)}}" onclick="return preg()" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>

                <!-- Modal para modificar -->
<div class="modal fade" id="modificarClienteModal{{ $item->id_cliente }}" tabindex="-1" aria-labelledby="modificarClienteModalLabel{{ $item->id_cliente }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modificarClienteModalLabel{{ $item->id_cliente }}">Modificar cliente</h5>
                
            </div>
            <div class="modal-body">
                <form action="{{ route('clientes.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_cliente">ID del cliente</label>
                        <input type="text" class="form-control" id="id_cliente" name="id_cliente" value="{{ $item->id_cliente }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre del cliente</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $item->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido del cliente</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $item->apellido }}" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección del cliente</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $item->direccion }}" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI del cliente</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="{{ $item->dni }}" required>
                    </div>
                    <div class="form-group">
                        <label for="cuit">Cuit</label>
                        <input type="text" class="form-control" id="cuit" name="cuit" value="{{ $item->cuit }}" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono del cliente</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $item->telefono }}" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal para modificar -->

                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal para agregar cliente -->
    <div class="modal fade" id="agregarClienteModal" tabindex="" aria-labelledby="agregarClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarClienteModalLabel">Agregar Cliente</h5>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route("clientes.create")}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="number" class="form-control" id="dni" name="dni" required>
                        </div>
                        <div class="form-group">
                            <label for="cuit">Cuit</label>
                            <input type="number" class="form-control" id="cuit" name="cuit" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary"><a href="/clientes"></a>Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
