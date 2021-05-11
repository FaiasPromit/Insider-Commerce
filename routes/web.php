<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/products/sell', [ProductController::class,'create'])->name('products.sell')->middleware('verified');
Route::get('products/edit/{id_number}', [ProductController::class,'edit'])->name('products.edit')->middleware('verified');
Route::post('/',[ProductController::class,'store'] )->name('products.store')->middleware('verified') ;
Route::post('products/update/{id_number}', [ProductController::class,'update'])->name('products.update')->middleware('verified');
Route::get('products/delete/{id_number}', [ProductController::class,'destroy'])->name('products.delete')->middleware('verified');
//buy related
Route::get('/products/buy/{cat}', [ProductController::class,'show'])->name('products.buy');
Route::get('/products/buy', [ProductController::class,'cat'])->name('products.buy');
//Route::get('/products/buy/All', [ProductController::class,'cat']);
// Route::get('/products/buy/{cat}', [ProductController::class,'show'])->name('products.buy');
Route::get('/products/myadds', [ProductController::class,'myadds'])->name('products.myadds')->middleware('verified');
Route::get('/products/showSingleProduct/{id_number}', [ProductController::class,'showSingleProduct'])->name('products.showSingleProduct')->middleware('verified');
// Route::get('products/favorite/{favorite_id}',[ProductController::class,'favorite'] )->name('products.favorite') ;
//Route::post('/products/showSingleProduct/',[ProductController::class,'addFavorite'])->name('products.addFavorite');
Route::get('/products/addFavorite/{id_number}', [ProductController::class,'addFavorite'])->name('products.addFavorite')->middleware('verified');
Route::get('/products/myfavorites/', [ProductController::class,'myfavorites'])->name('products.myfavorites')->middleware('verified');

// Route::get('/myadds', function () {
//     return view('myadds');
// });
Route::get('/products/removeFromFavorite/{favorite_id}',[ProductController::class,'removeFromFavorite'])->name('products.removeFromFavorite')->middleware('verified');
Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about')->middleware('verified');
Route::post('/about/passwordchange',[App\Http\Controllers\HomeController::class,'change'])->name('about.passwordchange')->middleware('verified');
Route::get('/deleteAccount',[ProductController::class,'deleteAccount'])->name('deleteAccount')->middleware('verified');