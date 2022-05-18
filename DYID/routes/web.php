<?php

use App\Http\Controllers\CartsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [ProductsController::class, 'showHome'])->name('home');
Route::get('/register', [PagesController::class, 'showRegister']);
Route::get('/login', [PagesController::class, 'showLogin']);

//Product
Route::prefix('/product')->group(function () {
    Route::get('insert', [ProductsController::class, 'showInsertProduct']);
    Route::post('insert', [ProductsController::class, 'store']);
    Route::get('edit/{id}', [ProductsController::class, 'showEdit']);
    Route::put('edit/{id}', [ProductsController::class, 'update']);
    Route::delete('delete/{id}', [ProductsController::class, 'delete']);
    Route::get('', [ProductsController::class, 'showManageProduct']);
    Route::get('{id}', [ProductsController::class, 'show']);
});
Route::get('/search', [ProductsController::class, 'search']);

//Categories
Route::prefix('/category')->group(function () {
    Route::get('edit/{id}', [CategoriesController::class, 'showEditCategory']);
    Route::put('edit/{id}', [CategoriesController::class, 'update']);
    Route::delete('delete/{id}', [CategoriesController::class, 'delete']);
    Route::get('insert', [CategoriesController::class, 'showInsertCategory']);
    Route::post('insert', [CategoriesController::class, 'store']);
    Route::get('', [CategoriesController::class, 'showManageCategory']);
});

Route::get('/history', [TransactionController::class, 'showHistory']);

//Cart
Route::get('/cart', [CartsController::class, 'showCart']);
Route::get('/cart/edit/{id}', [CartsController::class, 'showEditCart']);
Route::post('/cart/edit/{id}', [CartsController::class, 'update']);
Route::post('/cart/add/{id}', [CartsController::class, 'addToCart']);
Route::delete('/cart/delete/{id}', [CartsController::class, 'destroy']);
Route::post('/cart/checkout/{id}', [CartsController::class, 'confirm']);

// Database testing
Route::resource('/users', UsersController::class);

Auth::routes();
