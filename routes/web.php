<?php

use App\Http\Controllers\FurnitureController;
use App\Models\Furniture;
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

Route::get('/', [FurnitureController::class, 'index']);

Route::get('/view', [FurnitureController::class, 'view']);

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/details', function () {
    return view('details');
});
Route::get('/details/{furniturename}', [FurnitureController::class, 'goToDetail']);


Route::get('/add-item', function () {
    return view('/admin/add-item');
});

Route::get('/update-item/{furniture_id}', [FurnitureController::class, 'getFurniture']);

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

Route::post('/update-furniture', [FurnitureController::class, 'update_furniture']);

Route::post('/delete-furniture', [FurnitureController::class, 'deleteFurniture']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
