@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
    <h1>Lista de Productos</h1>
    <button type="button" class="btn btn-primary">Agregar</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Producto</th>
                <th>Marca</th>
                <th>Proveedor</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Producto A</td>
                <td>Marca X</td>
                <td>Proveedor Y</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing</td>
                <td>50</td>
                <td><button type="button" class="btn btn-success">Modificar</button> <button type="button" class="btn btn-danger">Eliminar</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Producto B</td>
                <td>Marca Y</td>
                <td>Proveedor Z</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipisicing </td>
                <td>30</td>
                <td><button type="button" class="btn btn-success">Modificar</button> <button type="button" class="btn btn-danger">Eliminar</button></td>
            </tr>
            <!-- Agrega más filas según sea necesario -->
        </tbody>
    </table>
@endsection
