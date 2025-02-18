<?php

use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DealController;

// Definieer de home route
Route::get('/', function () {
    return view('home');
})->name('home');

// Definieer de andere routes
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/deals', function () {
    return view('deals');
})->name('deals');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/deals', [DealController::class, 'index'])->name('deals');




// Redirect users based on their roles if they try to access /dashboard
Route::get('/dashboard', function () {
    // Check the role of the authenticated user and redirect accordingly
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role == 'employee') {
            return redirect()->route('employee.dashboard');
        }
    }

    return view('dashboard'); // For general users (no role or other types of users)
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

    // Customers CRUD routes
    Route::get('/admin/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('/admin/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('admin.customers.edit');
    Route::put('/admin/customers/{customer}', [CustomerController::class, 'update'])->name('admin.customers.update');
    Route::get('/admin/customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
    Route::post('/admin/customers', [CustomerController::class, 'store'])->name('admin.customers.store');
    Route::delete('/admin/customers/{customer}', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');
});

// Employee routes
Route::middleware(['auth', 'role:employee'])->group(function () {
    // Route for Employee Dashboard
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');

    // Communication (Messages) CRUD routes
    Route::get('/employee/communications', [CommunicationController::class, 'index'])->name('communications.index');
    Route::get('/employee/communications/create', [CommunicationController::class, 'create'])->name('communications.create');
    Route::post('/employee/communications', [CommunicationController::class, 'store'])->name('communications.store');
    Route::get('/employee/communications/{communication}/edit', [CommunicationController::class, 'edit'])->name('communications.edit');
    Route::put('/employee/communications/{communication}', [CommunicationController::class, 'update'])->name('communications.update');
    Route::delete('/employee/communications/{communication}', [CommunicationController::class, 'destroy'])->name('communications.destroy');

    // Other routes for invoices
    Route::get('/employee/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/employee/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
    Route::post('/employee/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::delete('/employee/invoices/{id}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
});

require __DIR__.'/auth.php';
