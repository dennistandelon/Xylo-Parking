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

// Route::get('/home/{locale?}', [TransactionController::class,'customerView'])->name('home');

Route::controller(TransactionController::class)->group(function(){
    Route::get('/home/{locale?}', 'customerView')->name('home');
    Route::get('/admin/{locale?}', 'adminView')->name('admin')->middleware('isadmin');
    Route::post('/create/', 'create')->name('create');
    Route::post('/update/', 'update')->name('update');
    Route::delete('/admin/delete/{id}','delete')->middleware('isadmin');
});

Route::redirect('/', '/login/en');

Route::controller(AuthController::class)->group(function(){
    Route::get('/signin/{locale?}', 'loginView')->name('loginView');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/register/{locale?}', 'registerView')->name('register');
    Route::post('/newaccount', 'register')->name('newaccount');
});
