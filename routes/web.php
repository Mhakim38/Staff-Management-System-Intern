<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    // =========================
    // PROFILE
    // =========================

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    // =========================
    // LEAVE
    // =========================

    Route::get('/leave', [LeaveController::class, 'index'])
        ->name('leave.index');

    Route::get('/leave/apply', [LeaveController::class, 'create'])
        ->name('leave.create');

    Route::post('/leave', [LeaveController::class, 'store'])
        ->name('leave.store');


    // =========================
    // ANNOUNCEMENTS
    // =========================

    Route::get('/announcements', [AnnouncementController::class, 'index'])
        ->name('announcements.index');
});

require __DIR__ . '/auth.php';
