<?php

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
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

// Auth routes
Auth::routes();

// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/medicine', [HomeController::class, 'medicine'])->name('medicine');
Route::get('/product/{slug}', [HomeController::class, 'productDetail'])->name('product.detail');
Route::post('add/to/cart', [HomeController::class, 'addToCart'])->name('add.to.cart')->middleware('auth');
Route::get('cart', [HomeController::class, 'cartPage'])->name('cart')->middleware('auth');
Route::delete('delete/cart/item', [HomeController::class, 'deleteCartItem'])->name('delete.cart.item')->middleware('auth');
Route::post('update/cart', [HomeController::class, 'updateCart'])->name('update.cart')->middleware('auth');
Route::get('doctors', [HomeController::class, 'doctors'])->name('doctor');
Route::get('user/setting', [HomeController::class, 'userSetting'])->name('user.setting');
Route::post('user/setting', [HomeController::class, 'userSettingStore'])->name('user.setting')->middleware('auth');
Route::put('user/{id}/setting', [HomeController::class, 'userSettingUpdate'])->name('user.setting.update')->middleware('auth');
Route::get('checkout', [HomeController::class, 'checkout'])->name('order.checkout')->middleware('auth');
Route::post('place/order', [HomeController::class, 'placeOrder'])->name('place.order')->middleware('auth');
Route::get('category/products/{slug}', [HomeController::class, 'categoryProducts'])->name('category.products');

// Admin panel routes
Route::group(['middleware' => ['auth', 'admin']], function(){

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('users/{id}/profile', [UserController::class, 'addProfile'])->name('users.add.profile');
    Route::post('users/store', [UserController::class, 'storeUser'])->name('users.store');
    Route::put('users/{id}/profile', [UserController::class, 'updateProfile'])->name('users.update.profile');
    Route::post('users/profile/{id}/add', [UserController::class, 'storeProfile'])->name('users.store.profile');
    Route::put('users/profile/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}/delete', [UserController::class, 'delete'])->name('users.delete');

    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');

    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{id}/delete', [ProductController::class, 'delete'])->name('products.delete');
    Route::delete('products/image/{id}/delete', [ProductController::class, 'deleteProductImage'])->name('products.image.delete');
});