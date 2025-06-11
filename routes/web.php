<?php

// routes/web.php (di proyek admin)
use App\Http\Controllers\ProfileController; // Bawaan Breeze
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    // Arahkan ke dashboard jika sudah login dan admin, atau ke login jika belum
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('login');
});

// Route ini akan diproteksi oleh middleware 'auth' (dari Breeze) dan 'admin' (custom kita)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Pastikan view ini ada
    })->name('admin.dashboard');

    // Route untuk profile (bawaan Breeze, bisa dipertahankan atau dihapus jika tidak perlu)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tambahkan route CRUD admin lainnya di sini
    // Resource route untuk Categories
    Route::resource('categories', CategoryController::class);
});

require __DIR__.'/auth.php'; // File route auth dari Breeze