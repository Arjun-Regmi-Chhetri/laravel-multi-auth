<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Back\LoginController;
use  App\Http\Controllers\AdminController;

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


Auth::routes();


Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//for backend

Route::prefix('cms')->name('back.')->group(function(){
    Route::middleware('auth:admin')->group(function(){
        Route::get('/admin',[AdminController::class, 'index'])->name('admin');
        Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
    });
    Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login.show');
    Route::Post('/login',[LoginController::class,'login'])->name('login.check');
});