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

Route::get('/', [HomeController::class, 'index'])->name('home');

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

Route::get('/cartItemOrder',function() {
    return view('order.cartItemOrder');
})->name('cartItemOrder');

// order
Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::post('/orderStore',[App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
