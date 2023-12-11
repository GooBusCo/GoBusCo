<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoletosController;
use Illuminate\Support\Facades\Session;
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

Route::get('/', function () { return view('home'); })->name('home');

Route::get('/itinerario', [BoletosController::class, 'buscar'])->name('buscar');

Route::get('/itinerario/boletos', [BoletosController::class, 'boletos'])->name('boletos');

Route::post('/itinerario/guardar', [BoletosController::class, 'almacenar'])->name('almacenar');

Route::get('/itinerario/asientos', [BoletosController::class, 'asientos'])->name('asientos');

Route::post('/itinerario/asientos/guardar', [BoletosController::class, 'asientos_store'])->name('asientos.guardar');

Route::get('/itinerario/pagar', [BoletosController::class, 'pago'])->name('pagar.view');

Route::post('/itinerario/cobro', [BoletosController::class, 'pagar'])->name('pagar');

Route::get('/ver-sesion', function () {
    $sesion = Session::all();
    return $sesion;
});