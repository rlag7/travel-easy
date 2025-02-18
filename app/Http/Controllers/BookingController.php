<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // ✅ Overzicht van boekingen per gebruiker met relaties
    public function index()
    {
        $bookings = Booking::where('customer_id', Auth::id())
            ->with(['customer', 'trip', 'invoices']) // Laad de relaties
            ->orderBy('purchase_date', 'desc')
            ->get();

        return view('employee.bookings.index', compact('bookings'));
    }

    public function create()
    {
        return view('employee.bookings.create');
    }
}
