<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DealController;
use App\Http\Controllers\BookingController;

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

<<<<<<< HEAD
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');






=======
// Registration Routes
Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
>>>>>>> e771153c2d4d9e7c97b4733e57bc8c54e844ee65

// Redirect users based on their roles if they try to access /dashboard
Route::get('/dashboard', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->role == 'employee') {
            return redirect()->route('employee.dashboard');
        }
    }
    return view('dashboard'); // For general users
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('/bookings', BookingController::class);
    

    // User Management Routes (Only List Users)
<<<<<<< HEAD
    //Route::get('/users', [UserController::class, 'index'])->name('admin.users');
=======
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::resource('/bookings', BookingController::class)->except(['show']);
>>>>>>> e771153c2d4d9e7c97b4733e57bc8c54e844ee65

    // Customer Management Routes
    Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
    Route::post('/customers', [CustomerController::class, 'store'])->name('admin.customers.store');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('admin.customers.edit');
    Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('admin.customers.update');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');

    // Customer Management Routes
    Route::get('/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('admin.bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('admin.bookings.store');
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('admin.bookings.edit');
    Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('admin.bookings.update');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('admin.bookings.destroy');
});

// General user profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Employee Routes
Route::middleware(['auth', 'role:employee'])->prefix('employee')->group(function () {
    Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');

    // Communication Routes
    Route::resource('/communications', CommunicationController::class)->except(['show']);

    // Invoice Routes
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
    Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::delete('/invoices/{id}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
});

// Trip Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
    Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create');
    Route::post('/trips', [TripController::class, 'store'])->name('trips.store');
    Route::get('/trips/{id}/edit', [TripController::class, 'edit'])->name('trips.edit');
    Route::put('/trips/{id}', [TripController::class, 'update'])->name('trips.update');
    Route::delete('/trips/{id}', [TripController::class, 'destroy'])->name('trips.destroy');
});

require __DIR__.'/auth.php';
