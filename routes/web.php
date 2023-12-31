<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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
Route::get('/',[HomeController::class,'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/productDetails/{id}',[HomeController::class,'productDetails']);
Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/show_cart',[HomeController::class,'show_cart']);
Route::get('/delete_cart/{id}',[HomeController::class,'delete_cart']);
Route::get('/cash_order',[HomeController::class,'cash_order']);
Route::get('/show_order',[HomeController::class,'show_order']);
Route::get('/delete_order/{id}',[HomeController::class,'delete_order']);









// Catagory
Route::get('/view_catagory',[AdminController::class,'view_catagory']);
Route::post('/add_catagory',[AdminController::class,'add_catagory']);
Route::get('/delete_catagory/{id}',[AdminController::class,'delete_catagory']);

// Add_product
Route::get('/view_product',[AdminController::class,'view_product']);
Route::post('/add_product',[AdminController::class,'add_product']);
Route::get('/show_product',[AdminController::class,'show_product']);
Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
Route::get('/edit_product/{id}',[AdminController::class,'edit_product']);
Route::post('/edit_confirm_product/{id}',[AdminController::class,'edit_confirm_product']);
Route::get('/order',[AdminController::class,'order']);
Route::get('/delivered/{id}',[AdminController::class,'delivered']);












