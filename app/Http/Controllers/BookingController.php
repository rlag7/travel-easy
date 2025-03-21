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

    

   
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'trip_id' => 'required|exists:trips,id',
        'seat_number' => 'required|string',
        'purchase_date' => 'required|date',
        'purchase_time' => 'required',
        'booking_status' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer|min:1',
        'special_requests' => 'nullable|string',
        'is_active' => 'boolean'
    ]);

    Booking::create([
        'customer_id' => Auth::id(), // ✅ Automatisch de ingelogde gebruiker koppelen
        'trip_id' => $validatedData['trip_id'],
        'seat_number' => $validatedData['seat_number'],
        'purchase_date' => $validatedData['purchase_date'],
        'purchase_time' => $validatedData['purchase_time'],
        'booking_status' => $validatedData['booking_status'],
        'price' => $validatedData['price'],
        'quantity' => $validatedData['quantity'],
        'special_requests' => $validatedData['special_requests'] ?? null,
        'is_active' => $validatedData['is_active'] ?? true,
    ]);
    
    return redirect()->route('bookings.index')->with('success', 'Boeking succesvol aangemaakt!');
    

}


    


    public function create()
    {
        return view('employee.bookings.create');
    }

    public function delete()
    {
        return view('employee.bookings.create');
    }
}
