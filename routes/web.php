<?php
use App\Http\Controllers\Crudcontroller;
use App\Http\Controllers\CrudcontrollerM;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clase1', function () {
    return view('index');
});


Route::get('/clientes', [Crudcontroller::class, "client"])->name('clientes');
//ruta para crear clientes
Route::post('/clientes_registrar', [Crudcontroller::class, "create"])->name('clientes.create');
//ruta para modificar clientes
Route::post('/clientes_modif', [Crudcontroller::class, "update"])->name('clientes.update');
//ruta para eliinar clientes
Route::get('/clientes_elim-{id_marca}', [Crudcontroller::class, "delete"])->name('clientes.delete');




Route::get('/marcas', [CrudcontrollerM::class, "marc"])->name('marcas');
//ruta para crear marcas
Route::post('/marcas_registrar', [CrudcontrollerM::class, "create"])->name('marcas.create');
//ruta para modificar marcas
Route::post('/marcas_modif', [CrudcontrollerM::class, "update"])->name('marcas.update');
//ruta para eliinar marcas
Route::get('/marcas_elim-{id_marca}', [CrudcontrollerM::class, "delete"])->name('marcas.delete');

Route::get('/proveedores', function () {
    return view('proveedores.prov');
})->name('proveedores');
Route::get('/productos', function () {
    return view('productos.produc');
})->name('productos');
