<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaypalPaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('handle-payment', [PayPalPaymentController::class, 'handlePayment'])->name('make.payment');
Route::get('cancel-payment', [PayPalPaymentController::class, 'paymentCancel'])->name('cancel.payment');
Route::get('payment-success', [PayPalPaymentController::class, 'paymentSuccess'])->name('success.payment');