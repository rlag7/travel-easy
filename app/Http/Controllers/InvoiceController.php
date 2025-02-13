<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Booking;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('employee.invoices.index', compact('invoices'));
    }

    public function create()
    {
        // Fetch all bookings and transform seat numbers to uppercase
        $bookings = Booking::all()->map(function ($booking) {
            $booking->seat_number = Str::upper($booking->seat_number);
            return $booking;
        });

        return view('employee.invoices.create', compact('bookings'));
    }

    public function store(Request $request)
    {
        // Validate the request (excluding invoice_number since it will be generated)
        $request->validate([
            'seat_number' => 'required|exists:bookings,seat_number',
            'invoice_date' => 'required|date',
            'amount_ex_vat' => 'required|numeric',
            'vat' => 'required|numeric',
            'amount_inc_vat' => 'required|numeric',
            'invoice_status' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        // Find the booking ID based on the selected seat number
        $booking = Booking::where('seat_number', Str::upper($request->seat_number))->first();

        // Generate a random invoice number
        $invoiceNumber = 'INV-' . strtoupper(uniqid());

        // Create the invoice with the generated invoice number
        Invoice::create([
            'booking_id' => $booking->id,
            'invoice_number' => $invoiceNumber,
            'invoice_date' => $request->invoice_date,
            'amount_ex_vat' => $request->amount_ex_vat,
            'vat' => $request->vat,
            'amount_inc_vat' => $request->amount_inc_vat,
            'invoice_status' => $request->invoice_status,
            'remarks' => $request->remarks,
        ]);

        // Redirect with success message
        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
    }

    public function destroy($id)
    {
        // Find the invoice by ID
        $invoice = Invoice::findOrFail($id);

        // Delete the invoice
        $invoice->delete();

        // Redirect back to the invoices index page with a success message
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully!');
    }
}
