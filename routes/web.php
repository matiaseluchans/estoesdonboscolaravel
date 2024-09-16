<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
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
    return view('layouts.home');
})->name('home');

Route::get('/ecko', function () {
    return view('ecko');
})->name('ecko');

Route::get('/colabora', function () {
    return view('colabora');
})->name('colabora');

Route::get('/iniciativas', function () {
    return view('iniciativas');
})->name('iniciativas');

Route::get('/sponsors', function () {
    return view('sponsors');
})->name('sponsors');

Route::get('/comision', function () {
    return view('comision');
})->name('comision');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');




Route::resource('productos', ProductoController::class);
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');

//Route::post('/productos/{id}/pago', [ProductoController::class, 'crearPago'])->name('productos.pago');


Route::post('/productos-pago/{id}', [ProductoController::class, 'createPayment']);
Route::get('/productos/{id}/success', [ProductoController::class, 'success'])->name('productos.success');
Route::get('/productos/failure', [ProductoController::class, 'failure'])->name('productos.failure');
Route::get('/productos/pending', [ProductoController::class, 'pending'])->name('productos.pending');


Route::get('/mail-test', [ProductoController::class, 'mailTest'])->name('productos.mailTest');
