<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/orders', [OrderController::class, 'order'])->name('ordenes');
Route::get('/orders/{order}', [OrderController::class, 'show']);
Route::get('/pay', [OrderController::class, 'pay'])->name('pagos');
Route::get('/clients', [OrderController::class, 'client']);
Route::get('/status', [OrderController::class, 'status'])->name('estado');
Route::get('/all', [OrderController::class, 'all'])->name('todas');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::put('/orders/{order}', [OrderController::class, 'update']);
