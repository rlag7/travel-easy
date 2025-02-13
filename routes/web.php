<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// General user dashboard (without the role-based redirect logic)
Route::get('/dashboard', function () {
    return view('dashboard'); // General user dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

// General user profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

// Employee routes
Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/employee/profile', [EmployeeController::class, 'profile'])->name('employee.profile');

    // Invoice routes (only employees can access these)
    Route::get('/employee/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/employee/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
    Route::post('/employee/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::delete('/invoices/{id}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
});

require __DIR__.'/auth.php';
