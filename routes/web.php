<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Models\Appointment;

// Home Route
Route::get('/', function () {
    return view('home'); // Ensure 'home' exists in resources/views
});

// Appointment Routes
Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointments.index');
Route::resource('appointments', AppointmentController::class);

// Dashboard Route (Fetch latest appointments)

Route::get('/dashboard', [AppointmentController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
// Dashboard Appointments Route
Route::get('/dashboard/appointments', [AppointmentController::class, 'dashboardAppointments'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.appointments');


// Profile Routes (Protected with Auth Middleware)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
require __DIR__.'/auth.php';
