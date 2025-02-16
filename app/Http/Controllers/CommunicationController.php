<?php

namespace App\Http\Controllers;

use App\Models\Communication;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    // Display the list of communications
    public function index()
    {
        $communications = Communication::where('employee_id', auth()->id())->get();
        return view('employee.communications.index', compact('communications'));
    }

    // Show the form to create a new communication
    public function create()
    {
        return view('employee.communications.create');
    }

    // Store a new communication
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'remarks' => 'nullable',
            'sent_at' => 'required|date',
        ]);

        Communication::create([
            'employee_id' => auth()->id(),
            'message' => $request->message,
            'remarks' => $request->remarks,
            'sent_at' => $request->sent_at,
            'is_active' => true, // Default to active
        ]);

        return redirect()->route('communications.index')->with('success', 'Communication created successfully.');
    }

    // Show the form to edit a communication
    public function edit(Communication $communication)
    {
        return view('employee.communications.edit', compact('communication'));
    }

    // Update an existing communication
    public function update(Request $request, Communication $communication)
    {
        $request->validate([
            'message' => 'required',
            'remarks' => 'nullable',
            'sent_at' => 'required|date',
        ]);

        $communication->update([
            'message' => $request->message,
            'remarks' => $request->remarks,
            'sent_at' => $request->sent_at,
            'is_active' => true, // Update status
        ]);

        return redirect()->route('communications.index')->with('success', 'Communication updated successfully.');
    }

    // Delete a communication
    public function destroy(Communication $communication)
    {
        $communication->delete();
        return redirect()->route('communications.index')->with('success', 'Communication deleted successfully.');
    }
}
