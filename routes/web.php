<?php

use App\Http\Controllers\HomeController;
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

//Route::get('/', function () {
//    $products = Product::query()->limit(1)->get();
//    return view('client.home.index', compact('products'));
//});
////Route::get('show', function () {
////    return view('client.home.show');
////});
//Route::resource('home',Home::class);

//Route::prefix('client')
//    ->as('client.')
//    ->group(function () {
//        Route::prefix('home')
//            ->as('home.')
//            ->group(function () {
//                Route::get('{id}/show',         [HomeController::class, 'show'])->name('show');
//            });
//    });
Route::get('/', function () {
    $products = Product::query()->limit(1)->get();
    return view('client.home.index', compact('products'));
});

Route::prefix('client')->as('client.')->group(function () {
    Route::resource('home', HomeController::class);
});

