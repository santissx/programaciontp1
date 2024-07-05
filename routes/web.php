<?php
use App\Http\Controllers\Crudcontroller;
use App\Http\Controllers\CrudcontrollerM;
use App\Http\Controllers\CrudcontrollerP;
use App\Http\Controllers\Crudcontrollerpp;
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

Route::get('/proveedores', [Crudcontrollerpp::class, "prov"])->name('proveedores');
//ruta para crear clientes
Route::post('/proveedores_registrar', [Crudcontrollerpp::class, "create"])->name('prov.create');
//ruta para modificar clientes
Route::post('/proveedores_modif', [Crudcontrollerpp::class, "update"])->name('prov.update');
//ruta para eliinar clientes
Route::get('/proveedores_elim-{id_proveedor}', [Crudcontrollerpp::class, "delete"])->name('prov.delete');


Route::get('/productos', [CrudcontrollerP::class, "produc"])->name('productos');
//ruta para crear productos
Route::post('/productos_registrar', [CrudcontrollerP::class, "create"])->name('produc.create');
//ruta para modificar clientes
Route::post('/productos_modif', [CrudcontrollerP::class, "update"])->name('produc.update');
//ruta para eliinar clientes
Route::get('/productos_elim-{id_producto}', [CrudcontrollerP::class, "delete"])->name('produc.delete');


