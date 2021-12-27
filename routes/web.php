<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;

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

// home

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/recent-view-more', [App\Http\Controllers\HomeController::class, 'recentViewMore'])->name('recentViewMore');

Route::get('/all-view-more', [App\Http\Controllers\HomeController::class, 'allViewMore'])->name('allViewMore');

Route::get('/authors', [App\Http\Controllers\HomeController::class, 'author'])->name('author');

Route::get('/author-book/{id}', [App\Http\Controllers\HomeController::class, 'authorBook'])->name('author-book');

Route::get('/desc-authors', [App\Http\Controllers\HomeController::class, 'authordesc'])-> name('authordesc');

Route::get('/categories', [App\Http\Controllers\HomeController::class, 'category'])->name('category');

Route::get('/desc-categories', [App\Http\Controllers\HomeController::class, 'categorydesc'])-> name('categorydesc');

Route::get('/category-book/{id}', [App\Http\Controllers\HomeController::class, 'cateBook'])->name('category-book');

Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])-> name('search');

// end

// admin

Route::resource('admin', AdminController::class)->names([
    'index' => 'admin',
]);

Route::get('/logout', [App\Http\Controllers\LogOutController::class, 'index'])->name('logOut');

Route::post('/cate-store', [App\Http\Controllers\CategoryStoreController::class, 'storeCategory'])->name('cateStore');

Route::post('/author-store', [App\Http\Controllers\CategoryStoreController::class, 'storeAuthor'])->name('authorStore');

Auth::routes(['reset' => false]);

// end

// cart

Route::get('/cart-item-order',function() {
    return view('order.cart_item_order');
})->name('cartItemOrder');

// end

// order

Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');

Route::post('/order-store',[App\Http\Controllers\OrderController::class, 'store'])->name('order.store');

// end

// view Order

Route::get('/view-order', [App\Http\Controllers\ViewOrderController::class, 'index'])->name('viewOrder');

Route::get('/order-approve/{order_id}', [App\Http\Controllers\ViewOrderController::class, 'approve'])->name('orderApprove');

Route::get('/order-done/{order_id}', [App\Http\Controllers\ViewOrderController::class, 'done'])->name('orderDone');

Route::get('/order-refuse/{order_id}', [App\Http\Controllers\ViewOrderController::class, 'refuse'])->name('orderRefuse');

// end