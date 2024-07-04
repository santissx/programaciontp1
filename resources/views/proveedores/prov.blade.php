@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <h1>Lista de clientes</h1>
    <button type="button" class="btn btn-primary">Agregar</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Mail</th>
                <th>Direccion</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Alfa</td>
                <td>Alfanea@coca.com</td>
                <td>Av 9 de julio</td>
                <td><button type="button" class="btn btn-success">Modificar</button> <button type="button" class="btn btn-danger">Eliminar</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Bracema</td>
                <td>Bracema@bracema.com</td>
                <td>Av pantaleon gomez</td>
                <td><button type="button" class="btn btn-success">Modificar</button> <button type="button" class="btn btn-danger">Eliminar</button></td>
            </tr>
            <!-- Agrega más filas según sea necesario -->
        </tbody>
    </table>
@endsection