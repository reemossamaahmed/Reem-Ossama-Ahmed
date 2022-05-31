<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('verified');

Route::get('dashboard/products', [ProductController::class,'index'])->name('dashboard.products')->middleware('verified');

Route::get('dashboard/products/create', [ProductController::class,'create'])->name('dashboard.products.create')->middleware('verified');

Route::post('dashboard/products/store', [ProductController::class,'store'])->name('dashboard.products.store')->middleware('verified');

Route::get('dashboard/products/edit/{product_id}', [ProductController::class,'edit'])->name('dashboard.products.edit')->middleware('verified');

Route::post('dashboard/products/update/{product_id}', [ProductController::class,'update'])->name('dashboard.products.update')->middleware('verified');

Route::post('dashboard/products/delete/{product_id}', [ProductController::class,'delete'])->name('dashboard.products.delete')->middleware('verified');



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
