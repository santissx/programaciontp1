@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
    <h1>Lista de Productos</h1>
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
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#agregarProducModal">
        Agregar
    </button>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Producto</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Marca</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datosP as $item)
                <tr>
                    <td>{{ $item->id_producto }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td>{{ $item->cantidad }}</td>
                    <td>{{ $item->id_marca }}</td>
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modificarProducModal{{ $item->id_producto }}">Modificar</button>
                        <a href="{{ route('produc.delete', $item->id_producto) }}" onclick="return preg()" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>

                <!-- Modal para modificar -->
                <div class="modal fade" id="modificarProducModal{{ $item->id_producto }}" tabindex="-1" aria-labelledby="modificarProducModalLabel{{ $item->id_producto }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modificarProducModalLabel{{ $item->id_producto }}">Modificar Producto</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('produc.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="id_producto">ID del producto</label>
                                        <input type="text" class="form-control" id="id_producto" name="id_producto" value="{{ $item->id_producto }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre_producto">Nombre del producto</label>
                                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{ $item->nombre }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción del producto</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $item->descripcion }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Stock del producto</label>
                                        <input type="text" class="form-control" id="stock" name="stock" value="{{ $item->cantidad }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_marca">Marca del producto</label>
                                        <select class="form-control" id="id_marca" name="id_marca" required>
                                            <option value="">Seleccione una marca</option>
                                            @foreach($marcas as $marca)
                                                <option value="{{ $marca->id_marca }}" {{ $item->id_marca == $marca->id_marca ? 'selected' : '' }}>
                                                    {{ $marca->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
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

    <!-- Modal para agregar producto -->
    <div class="modal fade" id="agregarProducModal" tabindex="-1" aria-labelledby="agregarProducModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarProducModalLabel">Agregar Producto</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('produc.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre_producto">Nombre del producto</label>
                            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción del producto</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock del producto</label>
                            <input type="text" class="form-control" id="stock" name="stock" required>
                        </div>
                        <div class="form-group">
                            <label for="id_marca">Marca del producto</label>
                            <select class="form-control" id="id_marca" name="id_marca" required>
                                <option value="">Seleccione una marca</option>
                                @foreach($marcas as $marca)
                                    <option value="{{ $marca->id_marca }}">{{ $marca->nombre }}</option>
                                @endforeach
                            </select>
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
