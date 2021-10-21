<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RateController;

/**
 * Basic Page
 */
Route::get('/', [PageController::class, 'landingPage'])->name('landingPage');
Route::get('/sort', [PageController::class, 'landingPageSort'])->name('landingPageSort');
Route::view('login', 'login')->name('login');
Route::view('register', 'register')->name('register');

/**
 * Seller
 */
Route::group(['prefix' => 'sellers'], function () {
    Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('sellers.dashboard');
    Route::get('/{id}/edit', [SellerController::class, 'edit'])->name('sellers.edit');
    Route::get('/{id}', [SellerController::class, 'show'])->name('sellers.show');
    Route::get('/{id}/sort', [SellerController::class, 'sort'])->name('sellers.sort');
    Route::patch('/{id}', [SellerController::class, 'update'])->name('sellers.update');
});

/**
 * Login and Logout
 */
Route::group(['prefix' => 'accounts'], function () {
    Route::get('/logout', [AccountController::class, 'logout'])->name('accounts.logout');
    Route::post('/login', [AccountController::class, 'login'])->name('accounts.login');
});

/**
 * Profile
 */
Route::group(['prefix' => 'buyers'], function () {
    Route::get('/{id}/edit', [BuyerController::class, 'edit'])->name('buyers.edit');
    Route::post('/', [BuyerController::class, 'store'])->name('buyers.store');
    Route::patch('/{id}', [BuyerController::class, 'update'])->name('buyers.update');
});

/**
 * Address
 */
Route::group(['prefix' => 'addresses'], function () {
    Route::get('/', [AddressController::class, 'index'])->name('addresses.index');
    Route::get('/create', [AddressController::class, 'create'])->name('addresses.create');
    Route::get('/{id}/edit', [AddressController::class, 'edit'])->name('addresses.edit');
    Route::post('/', [AddressController::class, 'store'])->name('addresses.store');
    Route::patch('/{id}', [AddressController::class, 'update'])->name('addresses.update');
    Route::delete('/{id}', [AddressController::class, 'destroy'])->name('addresses.destroy');
});

/**
 * Book
 */
Route::group(['prefix' => 'books'], function () {
    Route::patch('/update/{id}', [BookController::class, 'update'])->name('books.update');
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('/sort', [BookController::class, 'sort'])->name('books.sort');
    Route::get('/search', [BookController::class, 'search'])->name('books.search');
    Route::get('/create', [BookController::class, 'create'])->name('books.create');
    Route::get('/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::get('/{id}', [BookController::class, 'show'])->name('books.show');
    Route::post('/', [BookController::class, 'store'])->name('books.store');
    Route::delete('/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});

/**
 * Cart
 */
Route::group(['prefix' => 'carts'], function () {
    Route::get('/', [CartController::class, 'index'])->name('carts.index');
    Route::get('/update/{id}', [CartController::class, 'update'])->name('carts.update');
    Route::get('/destroy/{id}', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::post('/', [CartController::class, 'store'])->name('carts.store');
});

/**
 * Checkout
 */
Route::group(['prefix' => 'checkouts'], function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkouts.index');
    Route::post('/', [CheckoutController::class, 'store'])->name('checkouts.store');
    Route::patch('/update/{id}', [CheckoutController::class, 'update'])->name('checkouts.update');
    Route::delete('/destroy/{id}', [CheckoutController::class, 'destroy'])->name('checkouts.destroy');
});

/**
 * Order
 */
Route::group(['prefix' => 'orders'], function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/sort', [OrderController::class, 'sort'])->name('orders.sort');
    Route::get('/history', [OrderController::class, 'history'])->name('orders.history');
    Route::get('/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/', [OrderController::class, 'store'])->name('orders.store');
    Route::patch('/update/{id}', [OrderController::class, 'update'])->name('orders.update');
});

/**
 * Genre
 */
Route::group(['prefix' => 'genres'], function () {
    Route::get('/', [GenreController::class, 'index'])->name('genres.index');
    Route::get('/{id}', [GenreController::class, 'show'])->name('genres.show');
    Route::get('/{id}/sort', [GenreController::class, 'sort'])->name('genres.sort');
});

/**
 * Rate
 */
Route::group(['prefix' => 'rates'], function () {    
    Route::get('/edit/{id}', [RateController::class, 'edit'])->name('rates.edit');
    Route::post('/', [RateController::class, 'store'])->name('rates.store');
    Route::patch('/update', [RateController::class, 'update'])->name('rates.update');
});

