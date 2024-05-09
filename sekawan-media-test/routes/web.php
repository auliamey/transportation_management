<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleBookingController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/booking/create', [VehicleBookingController::class, 'create'])->name('vehicle.booking.create');
Route::post('/booking', [VehicleBookingController::class, 'store'])->name('vehicle.booking.store');
Route::get('/booking/export', [VehicleBookingController::class, 'export'])->name('booking.export');
Route::post('/booking/{id}/approve', [VehicleBookingController::class, 'approve'])->name('vehicle.booking.approve');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/export-bookings', [VehicleBookingController::class, 'export'])->name('vehicle.booking.export');
