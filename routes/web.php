<?php

use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Semua route aplikasi.
|
*/

// Halaman awal
Route::get('/', function () {
    return view('welcome');
});

// Redirect dashboard sesuai role
Route::get('/redirect-dashboard', function () {
    $user = Auth::user();

    if (!$user) {
        return redirect('/login');
    }

    switch ($user->role) {
        case 'admin':
            return redirect()->route('dashboard.admin');
        case 'panitia':
            return redirect()->route('dashboard.panitia');
        case 'peserta':
            return redirect()->route('dashboard.peserta');
        default:
            return redirect('/dashboard');
    }
})->middleware('auth')->name('redirect.dashboard');

// Dashboard umum (default Laravel Breeze/Jetstream)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Dashboard khusus per role
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin');
    })->name('dashboard.admin');

    Route::get('/dashboard/panitia', function () {
        return view('dashboard.panitia');
    })->name('dashboard.panitia');

    Route::get('/dashboard/peserta', function () {
        return view('dashboard.peserta');
    })->name('dashboard.peserta');
});

// Profile routes (bawaan Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Register khusus peserta (custom)
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register'])->name('register.post');

// Auth routes (bawaan Breeze/Jetstream)
require __DIR__ . '/auth.php';
