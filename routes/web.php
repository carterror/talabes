<?php

use App\Http\Controllers\InShoppingCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
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

    return view('welcome');

})->name("todo");

Route::resource('products', ProductController::class);
Route::resource('in_shopping_carts', InShoppingCartController::class)->only(['store', 'destroy']);

Route::get('/carrito', [ShoppingCartController::class , 'index'])->name('carrito.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
