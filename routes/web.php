<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MetrosController;
use App\Http\Controllers\LogViewerController;
use  App\Http\Controllers\Auth\LoginController;
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




Route::resource('metros', MetrosController::class);
Route::get('/metros', [MetrosController::class, 'index'])->name('metros.index');

//Route::post('/productos/{id}/pago', [MetrosController::class, 'crearPago'])->name('productos.pago');


Route::post('/metros-pago/{id}', [MetrosController::class, 'createPayment']);
Route::get('/metros/{id}/success', [MetrosController::class, 'success'])->name('metros.success');
Route::get('/metros/failure', [MetrosController::class, 'failure'])->name('metros.failure');
Route::get('/metros/pending', [MetrosController::class, 'pending'])->name('metros.pending');


Route::get('/mail-test', [MetrosController::class, 'mailTest'])->name('metros.mailTest');

Route::post('/mercadopago/webhook', [MetrosController::class, 'handleWebhook'])->name('webhook.mercadopago');




Route::get('/log-viewer', [LogViewerController::class, 'index'])->middleware('auth');

Route::get('/metros-vendidos', [MetrosController::class, 'vendidos'])->middleware('auth');


// Mostrar el formulario de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Procesar el inicio de sesión
Route::post('/login', [LoginController::class, 'login']);
