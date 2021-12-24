<?php

use App\Http\Controllers\FurnitureController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/view', function () {
    return view('view');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/details', function () {
    return view('details');
});

Route::get('/add-item', function () {
    return view('/admin/add-item');
});

Route::get('/tr-history', function () {
    return view('admin/transaction-history');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/update-profile', function () {
    return view('update-profile');
});

Route::post('/add-furniture', [FurnitureController::class, 'add_furniture']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
