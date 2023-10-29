<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllUserController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\MailConfigController;
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

Route::get('/sendemail', [SendEmailController::class, 'index']);
Route::post('/sendemail/send', [SendEmailController::class, 'send']);

Route::middleware(['guest'])->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // Register
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    // Direct ke route admin
    Route::get('/home', function () {
        return redirect('/admin/dashboard');
    });

    // Admin
    Route::middleware('userAkses:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index']);
        Route::get('/admin/user/alluser', [AllUserController::class, 'index'])->name('admin.user.alluser');
        Route::get('/admin/user/admin', [AdminController::class, 'usersAdmin'])->name('admin.user.admin');
        Route::get('/admin/user/mitra', [MitraController::class, 'mitraUsers'])->name('admin.user.mitra');
        Route::get('/admin/user/user', [UserController::class, 'userUsers'])->name('admin.user.user');

        Route::get('/admin/settings/mail-config', [MailConfigController::class, 'index'])->name('mail-config');
        Route::post('/admin/settings/mail-config/update', [MailConfigController::class, 'update'])->name('mail-config.update');

    });

    // Create User Admin
    Route::get('/admin/user/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/user/store', [AdminController::class, 'storeUser'])->name('admin.users.store');

    // Edit dan Update User
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/user/update/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');

    // View User
    Route::get('/admin/user/view/{id}', [AdminController::class, 'viewUser'])->name('admin.users.view');

    // Delete User
    Route::get('/admin/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');


    
    // Mitra
    Route::middleware('userAkses:mitra')->group(function () {
        Route::get('/mitra', [MitraController::class, 'index']);
    });

    // User
    Route::middleware('userAkses:user')->group(function () {
        Route::get('/user', [UserController::class, 'index']);
    });

    // Logout
    Route::get('/logout', [LoginController::class, 'logout']);
});