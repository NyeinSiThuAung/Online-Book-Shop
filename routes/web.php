<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('home');
});

Route::resource('admin', AdminController::class)->names([
    'index' => 'admin',
    'store' => 'admin.store',
    'create' => 'admin.create',
    'show' => 'admin.show',
    'update' => 'admin.update',
    'destroy' => 'admin.destroy',
    'edit' => 'admin.edit',
]);

Route::get('/home', [App\Http\Controllers\LogOutController::class, 'index'])->name('logOut');

Auth::routes();


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
