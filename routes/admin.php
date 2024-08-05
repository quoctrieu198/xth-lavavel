<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('order', OrderController::class);
    Route::resource('orderItem', OrderItemController::class);
   // Route để cập nhật trạng thái đơn hàng
   Route::put('order/{order}/update-status', [OrderController::class, 'updateOrderStatus'])->name('order.updateStatus');
   Route::put('order/{order}/update-payment-status', [OrderController::class, 'updatePaymentStatus'])->name('order.updatePaymentStatus');
  // Route in hóa đơn
  Route::get('order/invoma/print/{id}', [OrderController::class, 'printInvoma'])->name('order.invoma.print');




});
