<?php

use App\Http\Controllers\InShoppingCartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\TelegramController;
use App\Models\ShoppingCart;
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

Route::get('/', function () {
    return request();
    return view('welcome');

})->name("todo");


Route::get('/activity', [TelegramController::class , 'updatedActivity'])->name('telegram.activity');
Route::get('/notifica', [TelegramController::class , 'notifica'])->name('telegram.notifica');

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::resource('shops', ShopController::class);

Route::resource('in_shopping_carts', InShoppingCartController::class)->only(['store', 'destroy']);


Route::get('/carrito', [ShoppingCartController::class , 'index'])->name('carrito.index');
Route::get('/{id}/item/{o}', [ShoppingCartController::class , 'item'])->name('carrito.item');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
