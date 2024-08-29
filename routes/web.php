<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('/');

// route crud product
Route::resource('products', ProductController::class);
// route order costomer
Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('orders/datatables', [OrderController::class, 'getOrders'])->name('orders.datatables');
Route::resource('orders', OrderController::class);
