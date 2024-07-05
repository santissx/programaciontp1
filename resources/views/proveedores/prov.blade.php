@extends('layouts.app')

@section('title', 'Lista de proveedores')

@section('content')
    <h1>Lista de Proveedores</h1>
    @if (session("correcto"))
        <div class="alert alert-success">{{ session("correcto") }}</div>
    @endif
    @if (session("incorrecto"))
        <div class="alert alert-danger">{{ session("incorrecto") }}</div>
    @endif
    <script>
        var preg = function() { 
            var not = confirm("¿Estás seguro de eliminar?");
            return not; 
        };
    </script>

    <!-- Botón para abrir el modal de agregar producto -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#agregarProvModal">
        Agregar
    </button>


    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Mail</th>
                <th>Direccion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datospp as $item)
                <tr>
                    <td>{{ $item->id_proveedor }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->mail }}</td>
                    <td>{{ $item->direccion }}</td>
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modificarProvModal{{ $item->id_proveedor }}">Modificar</button>
                        <a href="{{ route('prov.delete', $item->id_proveedor) }}" onclick="return preg()" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            
                
                <!-- Modal para modificar -->
                <div class="modal fade" id="modificarProvModal{{ $item->id_proveedor }}" tabindex="-1" aria-labelledby="modificarProvModalLabel{{ $item->id_proveedor }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modificarProvModalLabel{{ $item->id_proveedor }}">Modificar Proveedor</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('prov.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="id_proveedor">ID del proveedor</label>
                                        <input type="text" class="form-control" id="id_proveedor" name="id_proveedor" value="{{ $item->id_proveedor }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre_proveedor">Nombre del proveedor</label>
                                        <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" value="{{ $item->nombre }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mail">mail del proveedor</label>
                                        <input type="text" class="form-control" id="mail" name="mail" value="{{ $item->mail }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $item->direccion }}" required>
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
            @endforeach
        </tbody>
    </table>


        </tbody>
    </table>
    
    <!-- Modal para agregar proveedor -->
    <div class="modal fade" id="agregarProvModal" tabindex="-1" aria-labelledby="agregarProvModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarProvModalLabel">Agregar Proveedor</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('prov.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre_proveedor">Nombre del proveedor</label>
                            <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" required>
                        </div>
                        <div class="form-group">
                            <label for="mail">mail del producto</label>
                            <input type="text" class="form-control" id="mail" name="mail" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">direccion del producto</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
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
@endsection
