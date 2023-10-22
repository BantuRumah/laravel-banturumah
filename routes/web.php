<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomepageController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomepageController::class, 'home']);
    Route::get('/service', [HomepageController::class, 'service']);
    Route::get('/about-us', [HomepageController::class, 'about']);
});

Route::middleware(['guest'])->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::get('/home', function() {
    return redirect('admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/mitra', [MitraController::class, 'index'])->middleware('userAkses:mitra');
    Route::get('/user', [UserController::class, 'index'])->middleware('userAkses:user');
    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::get('/register', [RegisterController::class, 'index']);
