<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Catalogo Routes
use App\Http\Controllers\CatalogoController;

Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');

use App\Http\Controllers\ProductosController;

Route::resource('productos', ProductosController::class);