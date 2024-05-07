<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleBookingController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/booking/create', [VehicleBookingController::class, 'create'])->name('vehicle.booking.create');
// Route untuk menyimpan data pemesanan kendaraan
Route::post('/booking', [VehicleBookingController::class, 'store'])->name('vehicle.booking.store');

// Route untuk menampilkan dashboard statistik
// Route::get('/dashboard', [VehicleBookingController::class, 'showDashboard'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route untuk mengekspor laporan pemesanan kendaraan
Route::get('/booking/export', [VehicleBookingController::class, 'export'])->name('booking.export');
