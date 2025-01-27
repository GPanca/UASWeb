<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('admin')->group(function () {
        Route::resource('vehicles', VehicleController::class);
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::get('/dashboard/admin', [DashboardController::class, 'index']);
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::post('/vehicles', [DashboardController::class, 'store'])->name('vehicles.store');
    Route::put('/vehicles/{id}', [DashboardController::class, 'update'])->name('vehicles.update');
    Route::delete('/vehicles/{id}', [DashboardController::class, 'destroy'])->name('vehicles.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/user', [UserController::class, 'dashboard'])->name('user.dashboard');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');