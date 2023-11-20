<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AllUserController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\MailConfigController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

// Forgot Password Routes
Route::prefix('forgot-password')->middleware('guest')->group(function () {
    Route::get('/', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
});

// Reset Password Routes
Route::prefix('reset-password')->middleware('guest')->group(function () {
    Route::get('/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::middleware(['auth'])->group(function () {
    // Direct ke route admin
    Route::get('/home', function () {
        return redirect('/admin/dashboard');
    });

    // Admin
    Route::middleware('userAkses:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index']);
        Route::prefix('admin/user')->name('admin.user.')->group(function () {
            Route::get('/alluser', [AllUserController::class, 'index'])->name('alluser');
            Route::get('/admin', [AdminController::class, 'usersAdmin'])->name('admin');
            Route::get('/mitra', [MitraController::class, 'mitraUsers'])->name('mitra');
            Route::get('/keterangan-mitra', [MitraController::class, 'keteranganMitra'])->name('keterangan-mitra');
            Route::get('/create-keterangan-mitra', [MitraController::class, 'create'])->name('create-keterangan-mitra');
            Route::post('/create-keterangan-mitra', [MitraController::class, 'store'])->name('create-keterangan-mitra.store');
            Route::get('/edit-keterangan-mitra/{id}', [MitraController::class, 'editKeteranganMitra'])->name('keterangan-mitra.edit');
            Route::put('/update-keterangan-mitra/{id}', [MitraController::class, 'updateKeteranganMitra'])->name('keterangan-mitra.update');
            Route::delete('/delete-keterangan-mitra/{id}', [MitraController::class, 'deleteKeteranganMitra'])->name('keterangan-mitra.delete');
            Route::get('/user', [UserController::class, 'userUsers'])->name('user');
        });

        Route::middleware(['auth', 'userAkses:admin'])->prefix('admin')->name('admin.')->group(function () {
            Route::get('/transaksi', [AdminTransaksiController::class, 'index'])->name('transaksi');
            Route::delete('/transaksi/{id}', [AdminTransaksiController::class, 'destroy'])->name('transaksi.destroy');
            Route::put('/transaksi/{id}', [AdminTransaksiController::class, 'update_status'])->name('transaksi.update_status');
        });

        Route::get('/admin/settings/debug', [AdminSettingController::class, 'index'])->name('indexdebug');
        Route::post('/admin/settings/debug', [AdminSettingController::class, 'update'])->name('debug.update');                
        Route::get('/admin/settings/mail-config', [MailConfigController::class, 'index'])->name('mail-config');
        Route::post('/admin/settings/mail-config/update', [MailConfigController::class, 'update'])->name('mail-config.update');

    });

    // Grouping untuk Rute Pengguna Admin
    Route::middleware('auth')->middleware('userAkses:admin')->prefix('admin/user')->name('admin.users.')->group(function () {
        // Create User Admin
        Route::get('/create', [AdminController::class, 'createUser'])->name('create');
        Route::post('/store', [AdminController::class, 'storeUser'])->name('store');

        // Edit dan Update User
        Route::get('/edit/{id}', [AdminController::class, 'editUser'])->name('edit');
        Route::put('/update/{id}', [AdminController::class, 'updateUser'])->name('update');

        // View User
        Route::get('/view/{id}', [AdminController::class, 'viewUser'])->name('view');

        // Delete User
        Route::get('/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete');
    });
    
    // Mitra
    Route::middleware('userAkses:mitra')->group(function () {
        Route::get('/mitra', [MitraController::class, 'index']);
    });

    // User
    Route::middleware('userAkses:user')->group(function () {
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/mitra-list', [UserController::class, 'mitraList'])->name('user.mitra-list');
        Route::get('/user/riwayat-transaksi', [AdminTransaksiController::class, 'riwayattransaksi'])->name('user.riwayat-transaksi');
        Route::get('/reorder/{id}', [AdminTransaksiController::class, 'reorder'])->name('reorder');

        // Transaksi
        Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
        Route::get('/transaksi/list', [TransaksiController::class, 'index'])->name('transaksi.index');
    });

    Route::get('/update_profiles', [UserProfileController::class, 'edit'])->name('profile1.update');
    Route::put('/update_profiles', [UserProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/delete-picture', [UserProfileController::class, 'deletePicture'])->name('profile.delete_picture');

    // Logout
    Route::get('/logout', [LoginController::class, 'logout']);
});