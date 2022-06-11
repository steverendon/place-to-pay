<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [OrderController::class, 'index'])->name('order.index');
Route::get('/ordenes', [OrderController::class, 'index'])->name('order.index');
Route::get('/ordenes/{id}', [OrderController::class, 'show'])->name('order.show');
Route::post('/ordenes', [OrderController::class, 'store'])->name('order.store');
Route::put('/ordenes/{id}', [OrderController::class, 'update'])->name('order.update');

Route::get('/sales', [SaleController::class, '__invoke'])->name('sale');

Route::get('/pago', [OrderController::class, 'index'])->name('pay.index');


