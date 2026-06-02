<?php

use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\FichaTecnicaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::middleware(['horario'])->group(function () {
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

    Route::get('/fabricantes/create', [FabricanteController::class, 'create'])->name('fabricantes.create');
    Route::post('/fabricantes', [FabricanteController::class, 'store'])->name('fabricantes.store');
});

Route::get('/fabricantes/{fabricante}/productos', [FabricanteController::class, 'productos'])
    ->name('fabricantes.productos');
Route::get('/productos/{producto}/fabricante', [ProductoController::class, 'fabricante'])
    ->name('productos.fabricante');
Route::get('/productos/{producto}/ficha', [ProductoController::class, 'ficha'])
    ->name('productos.ficha');
Route::get('/fichas/{fichaTecnica}/producto', [FichaTecnicaController::class, 'producto'])
    ->name('fichas.producto');

Route::redirect('/', '/productos');