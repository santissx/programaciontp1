@extends('layouts.app')

@section('title', 'Lista de Marcas')

@section('content')
    <h1>Lista de Marcas</h1>

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
            <!-- Botón para abrir el modal de agregar marca -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#agregarMarcaModal">
                Agregar
            </button>
            
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de la marca</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $item)
                <tr>
                    <td>{{ $item->id_marca }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modificarMarcaModal{{ $item->id_marca }}">Modificar</button>
                        <a href="{{route('marcas.delete', $item->id_marca)}}" onclick="return preg()" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            
                <!-- Modal para modificar -->
                <div class="modal fade" id="modificarMarcaModal{{ $item->id_marca }}" tabindex="-1" aria-labelledby="modificarMarcaModalLabel{{ $item->id_marca }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modificarMarcaModalLabel{{ $item->id_marca }}">Modificar Marca</h5>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('marcas.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="id">ID de la Marca</label>
                                        <input type="text" class="form-control" id="id_marca" name="id_marca" value="{{ $item->id_marca }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Nombre de la Marca</label>
                                        <input type="text" class="form-control" id="nombre_marca" name="nombre_marca" value="{{ $item->nombre }}" required>
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
    </div>

    <!-- Modal para agregar marca -->
    <div class="modal fade" id="agregarMarcaModal" tabindex="" aria-labelledby="agregarMarcaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarMarcaModalLabel">Agregar Marca</h5>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route("marcas.create")}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre de la marca</label>
                            <input type="text" class="form-control" id="nombre_marca" name="nombre_marca" required>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary"><a href="/marcas"></a>Guardar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
@endsection