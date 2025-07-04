<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ProductosController;

Route::resource('productos', ProductosController::class);

use App\Http\Controllers\NosotrosController;
Route::get('/nosotros', [NosotrosController::class, 'index'])->name('nosotros');    

use App\Http\Controllers\ContactoController;

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto.index');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

Auth::routes();

// Ruta para Mi Cuenta (protegida por auth)

use App\Http\Controllers\MiCuentaController;
Route::middleware(['auth'])->group(function () {
    Route::get('/micuenta.index', [MiCuentaController::class, 'index'])->name('micuenta.index');
    Route::post('/agregar-contacto', [MiCuentaController::class, 'agregarContacto'])->name('agregar-contacto');
});