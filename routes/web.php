<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\VentaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home2', [App\Http\Controllers\HomeController::class, 'index2'])->name('home2');    
    Route::group(['middleware' =>'auth'], function(){

    Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
    Route::get('/buscador', 'App\Http\Controllers\ProductoController@buscador');
    Route::get('/buscadorauto', 'App\Http\Controllers\ProductoController@buscadorauto');
    Route::get('/buscadorautoventa', 'App\Http\Controllers\VentaController@buscadorautoventa');
    Route::get('/ventas/agregar', 'App\Http\Controllers\VentaController@agregar');
    Route::get('/ventas/fincompra', 'App\Http\Controllers\VentaController@fincompra');
    Route::get('/ventas/finalizarcompra', 'App\Http\Controllers\VentaController@finalizarcompra');
    Route::get('/buscadordetalle/', 'App\Http\Controllers\DetalleventaController@buscadordetalle');
    Route::get('/buscadordetalleauto/', 'App\Http\Controllers\DetalleventaController@buscadordetalleauto');
    Route::get('/ventas/stockdecreciente', 'App\Http\Controllers\DetalleventaController@stockdecreciente');
    Route::get('/editionstock2', 'App\Http\Controllers\ProductoController@editionstock');
    Route::get('/detallestock', 'App\Http\Controllers\ProductoController@detallestock');
    Route::get('/buscadorstock', 'App\Http\Controllers\ProductoController@buscadorstock');
    Route::get('/detalleventaindex', 'App\Http\Controllers\DetalleventaController@detalleventaindex');
    Route::get('/reportes', 'App\Http\Controllers\DetalleventaController@reportespfd');
    //Rutas para la sede santa maria del lago 
    Route::get('/buscador2', 'App\Http\Controllers\Producto2Controller@buscador');
    Route::get('/buscadorauto2', 'App\Http\Controllers\Producto2Controller@buscadorauto');
    Route::get('/buscadorautoventa2', 'App\Http\Controllers\Venta2Controller@buscadorautoventa');
    Route::get('/ventas2/agregar', 'App\Http\Controllers\Venta2Controller@agregar');
    Route::get('/ventas2/fincompra', 'App\Http\Controllers\Venta2Controller@fincompra');
    Route::get('/ventas2/finalizarcompra', 'App\Http\Controllers\Venta2Controller@finalizarcompra');
    Route::get('/buscadordetalle2', 'App\Http\Controllers\Detalleventa2Controller@buscadordetalle');
    Route::get('/buscadordetalleauto2', 'App\Http\Controllers\Detalleventa2Controller@buscadordetalleauto');
    Route::get('/ventas2/stockdecreciente', 'App\Http\Controllers\Detalleventa2Controller@stockdecreciente');
    Route::get('/createstock', 'App\Http\Controllers\Producto2Controller@createstock');
    Route::get('/nuevostock2', 'App\Http\Controllers\Producto2Controller@nuevostock');
    Route::get('/detallestock2', 'App\Http\Controllers\Producto2Controller@detallestock');
    Route::get('/buscadorstock2', 'App\Http\Controllers\Producto2Controller@buscadorstock');
    Route::get('/reportes2', 'App\Http\Controllers\Detalleventa2Controller@reportespfd');
    Route::get('/detalleventa2/printpdf', 'App\Http\Controllers\Detalleventa2Controller@printpdf');
    Route::get('/detalleventa2/printexcell', 'App\Http\Controllers\Detalleventa2Controller@printexcell');
    //Rutas de los resource y vistas principales
    Route::resource('detalleventas', App\Http\Controllers\DetalleventaController::class);
    Route::resource('detalleventas2', App\Http\Controllers\Detalleventa2Controller::class);
    Route::resource('ventas', App\Http\Controllers\VentaController::class);
    Route::resource('ventas2', App\Http\Controllers\Venta2Controller::class);
    Route::resource('productos2', App\Http\Controllers\Producto2Controller::class);
    Route::resource('productos', App\Http\Controllers\ProductoController::class);
    Route::resource('perfil', App\Http\Controllers\PerfilController::class);
    Route::resource('historial', App\Http\Controllers\HistorialController::class);
    Route::resource('permissions', App\Http\Controllers\permissionController::class);
    Route::resource('roles', App\Http\Controllers\rolesController::class);




    


    

});
