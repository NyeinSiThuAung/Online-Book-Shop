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
Route::get('/recentViewMore', [App\Http\Controllers\HomeController::class, 'recentViewMore'])->name('recentViewMore');
Route::get('/allViewMore', [App\Http\Controllers\HomeController::class, 'allViewMore'])->name('allViewMore');
Route::get('/authors', [App\Http\Controllers\HomeController::class, 'author'])->name('author');
Route::get('/dauthors', [App\Http\Controllers\HomeController::class, 'authordesc'])-> name('authordesc');
Route::get('/categories', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/dcategories', [App\Http\Controllers\HomeController::class, 'categorydesc'])-> name('categorydesc');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])-> name('search');

// end

// admin
Route::resource('admin', AdminController::class)->names([
    'index' => 'admin',
    'store' => 'admin.store',
    'create' => 'admin.create',
    'show' => 'admin.show',
    'update' => 'admin.update',
    'destroy' => 'admin.destroy',
    'edit' => 'admin.edit',
]);
Route::get('/logOut', [App\Http\Controllers\LogOutController::class, 'index'])->name('logOut');
Route::post('/cateStore', [App\Http\Controllers\CategoryStoreController::class, 'storeCategory'])->name('cateStore');
Route::post('/authorStore', [App\Http\Controllers\CategoryStoreController::class, 'storeAuthor'])->name('authorStore');
Auth::routes(['reset' => false]);
// end

// cart
Route::get('/cartItemOrder',function() {
    return view('order.cartItemOrder');
})->name('cartItemOrder');
// end

// order
Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::post('/orderStore',[App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
// end

// view Order
Route::get('/viewOrder', [App\Http\Controllers\viewOrderController::class, 'index'])->name('viewOrder');
Route::get('/orderApprove/{order_id}', [App\Http\Controllers\viewOrderController::class, 'approve'])->name('orderApprove');
Route::get('/orderDone/{order_id}', [App\Http\Controllers\viewOrderController::class, 'done'])->name('orderDone');
Route::get('/orderRefuse/{order_id}', [App\Http\Controllers\viewOrderController::class, 'refuse'])->name('orderRefuse');