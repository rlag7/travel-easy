<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        return view('employee.dashboard');
    }

    public function profile()
    {
        $employee = Auth::user();
        return view('employee.profile', compact('employee'));
    }

    public function createInvoice()
    {
        return view('employee.create-invoice');
    }

    public function storeInvoice(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'invoice_number' => 'required|unique:invoices,invoice_number',
            'invoice_date' => 'required|date',
            'amount_ex_vat' => 'required|numeric',
            'vat' => 'required|numeric',
            'amount_inc_vat' => 'required|numeric',
            'invoice_status' => 'required|in:paid,unpaid',
        ]);

        Invoice::create([
            'booking_id' => $request->booking_id,
            'invoice_number' => $request->invoice_number,
            'invoice_date' => $request->invoice_date,
            'amount_ex_vat' => $request->amount_ex_vat,
            'vat' => $request->vat,
            'amount_inc_vat' => $request->amount_inc_vat,
            'invoice_status' => $request->invoice_status,
            'is_active' => true,
            'remarks' => $request->remarks ?? null,
        ]);

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

}


