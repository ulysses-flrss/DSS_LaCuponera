<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\OfertasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('empleado', EmpleadoController::class);
Route::resource('empresa', EmpresaController::class);

Route::get('/ofertas/espera', [OfertasController::class, 'EsperaAprobacion'])->name('ofertas.espera');
Route::get('/ofertas/futuras', [OfertasController::class, 'FuturaAprobacion'])->name('ofertas.futuras');
Route::get('/ofertas/activas', [OfertasController::class, 'OfertaActiva'])->name('ofertas.activas');
Route::get('/ofertas/pasadas', [OfertasController::class, 'OfertaPasada'])->name('ofertas.pasadas');
Route::get('/ofertas/rechazadas', [OfertasController::class, 'OfertaRechazada'])->name('ofertas.rechazadas');
Route::get('/ofertas/descartadas', [OfertasController::class, 'OfertaDescartada'])->name('ofertas.descartadas');

