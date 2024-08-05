<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsMember;
use App\Models\Banner;
use App\Models\Home;
use App\Models\Product;
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


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [HomeController::class, 'shop'])->name('home.shop');
//Route::get('/cart', [HomeController::class, 'cart'])->name('home.cart');

Route::prefix('client')->as('client.')->group(function () {
    Route::resource('home', HomeController::class);
});

//Chi tiet san pham
Route::get('product/{slug}', [App\Http\Controllers\ProductCotroller::class, 'detail'])->name('product.detail');

// Mua hàng
Route::post('cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::get('cart/list', [App\Http\Controllers\CartController::class, 'list'])->name('cart.list');
Route::post('oder/add', [App\Http\Controllers\OrderController::class, 'add'])->name('oder.add');

// dang ky
Route::get('auth/register',[\App\Http\Controllers\Auth\RegisterController::class,'index'])->name('register');
Route::post('auth/register',[\App\Http\Controllers\Auth\RegisterController::class,'register'])->name('register');

//dang nhap
Route::get('auth/login', [LoginController::class, 'index'])->name('login');
Route::post('auth/login', [LoginController::class, 'login'])->name('login');
Route::post('auth/logout', [LoginController::class, 'logout'])->name('logout'); // Đổi từ GET sang POST
Route::get('auth/verify/{token}', [LoginController::class, 'verify'])->name('verify');



// thu bao mat

//Route::get('client',[HomeController::class,'dashboard'])->name('home.dashboard')->middleware(['auth',IsMember::class]);
//Route::get('admin',[AdminController::class,'dashboard'])->name('admin.dashboard')->middleware(['auth',IsAdmin::class]);






