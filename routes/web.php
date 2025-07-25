<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\ArsipController as AdminArsipController;
use App\Http\Controllers\Admin\KategoriArsipController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\KategoriArsipController as AdminKategoriController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\User\ArsipController as UserArsipController;
use App\Http\Controllers\User\KategoriController as UserKategoriController;
use App\Http\Controllers\User\LaporanController as UserLaporanController;
use App\Http\Controllers\User\AktivitasController;
use App\Http\Controllers\User\ProfilController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return auth()->check() ? redirect('/dashboard') : redirect('/login');
});

// Login dan Logout (Hanya untuk yang belum login)
Route::middleware('guestonly')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Logout (Hanya untuk yang sudah login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profil/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Route yang hanya bisa diakses oleh user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;

        return $role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('users.dashboard');
    })->name('dashboard');

    // Admin Routes
    Route::prefix('admin')->middleware('admin:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
        Route::resource('kategori-arsip', KategoriArsipController::class)->names('admin.kategori-arsip');

        // Route CRUD User
        Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
        Route::post('/users', [AdminUserController::class, 'store'])->name('admin.users.store'); // ✅ tambahkan ini
        Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

        // Route lainnya
        Route::resource('/arsip', AdminArsipController::class)->names('admin.arsip');
        Route::resource('/kategori', AdminKategoriController::class)->names('admin.kategori');
    });

    // User Routes
    Route::prefix('user')->middleware('user:user')->group(function () {
        Route::get('/dashboard', [UserDashboard::class, 'index'])->name('users.dashboard');
        Route::resource('arsip', UserArsipController::class)->names('users.arsip');
        Route::get('/arsip/search', [UserArsipController::class, 'search'])->name('users.arsip.search');
        Route::post('user/arsip', [UserArsipController::class, 'store'])->name('users.arsip.store');
        Route::get('/kategori', [UserKategoriController::class, 'index'])->name('users.kategori.index');
        Route::resource('laporan', UserLaporanController::class)->names('users.laporan');
        Route::get('/profil', [ProfilController::class, 'index'])->name('users.profil.index');
        Route::put('/profil/update', [ProfilController::class, 'update'])->name('users.updateProfil');
    });
});
