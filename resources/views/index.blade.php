<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mi Aplicación</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clientes') }}">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('marcas') }}">Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('proveedores') }}">Proveedores</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container">
        @yield('content')
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">clientes</th>
                        <th scope="col">proveedores</th>
                        <th scope="col">marcas</th>
                        <th scope="col">productos</th>
                    </tr>
                </thead>
                <tbody>
                    <td>
                        <div class="card" style="width: 10rem;">
                            <img src="{{ asset('img/revisar.png') }}" class="card-img-top" alt="Imagen de Clientes">
                            <div class="card-body">
                                <a href="{{ route('clientes') }}" class="btn btn-primary">Ir a Clientes</a>
                            </div>
                        </div>
                    </td>
                        <td>
                            <div class="card" style="width: 10rem;">
                                <img src="{{ asset('img/proveedor-alternativo.png') }}" class="card-img-top" alt="Imagen de Proveedores">
                                <div class="card-body">
                                    <a href="{{ route('proveedores') }}" class="btn btn-primary">Ir a Proveedores</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="card" style="width: 10rem;">
                                <img src="{{ asset('img/marca.png') }}" class="card-img-top" alt="Imagen de Marcas">
                                <div class="card-body">
                                    <a href="{{ route('marcas') }}" class="btn btn-primary">Ir a Marcas</a>
                                </div>
                            </div>
                        </td>
                        
                        <td>
                            <div class="card" style="width: 10rem;">
                                <img src="{{ asset('img/caja-abierta.png') }}"  class="card-img-top" alt="Imagen de Productos">
                                <div class="card-body">
                                    <a href="{{ route('productos') }}" class="btn btn-primary">Ir a Productos</a>
                                </div>
                            </div>
                        </td>
                </tbody>
            </table>
        </div>
        
    </div>
</body>
</html>
