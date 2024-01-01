<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
USE App\Http\Controllers\AuthController;

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

Route::controller(TransactionController::class)->group(function(){
    Route::get('/home', 'customerView')->name('home');
    Route::get('/admin', 'adminView')->name('admin');
    Route::post('/create', 'create')->name('create');
    Route::post('/update', 'update')->name('update');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'loginView')->name('login');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/register', 'registerView')->name('register');
    Route::post('/newaccount', 'register')->name('newaccount');
});
