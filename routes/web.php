<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PalaController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CarritoItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/userpalas', [PalaController::class, 'userPalas'])->name('user.userpalas');
Route::get('/mispalas', [PalaController::class, 'misPalas'])->name('palas.misPalas');
Route::resource('palas', PalaController::class);

Route::get('admin/index', function () {
    if (Auth::check() && Auth::user()->rol == 0) {
        return view('admin.index');
    }
    return redirect('/'); 
})->name('admin.index');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware([])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    
    Route::get('/palas', [PalaController::class, 'index'])->name('palas.index');

    Route::post('/palas/{pala}/add-to-carrito', [CarritoController::class, 'addToCarrito'])->name('palas.addToCarrito');
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::delete('/carrito/{carrito}/items/{item}', [CarritoController::class, 'destroyItem'])->name('carrito.items.destroy');
    Route::view('/carrito/advertencia', 'carrito.advertencia')->name('carrito.advertencia');

    Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::patch('/pedidos/{pedido}', [PedidoController::class, 'update'])->name('pedidos.update');
    Route::get('/pedidos/adminpedidos', [PedidoController::class, 'admin'])->name('pedidos.adminpedidos');
    Route::get('/pedidos/{pedido}', [PedidoController::class, 'show'])->name('pedidos.show');
    Route::delete('/pedidos/{pedido}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');
    



 
});

require __DIR__.'/auth.php';
