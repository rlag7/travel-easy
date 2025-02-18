<?php

namespace App\Http\Controllers;

use App\Models\Communication;
use App\Models\Employee;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    public function index()
    {
        return view('employee.communications.index', [
            'employees' => Employee::with(['communications', 'person'])->get()
        ]);
    }

    public function create()
    {
        return view('employee.communications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:255',
        ]);

        Communication::create([
            'customer_id' => 1, // Replace with actual customer_id
            'employee_id' => 1, // Replace with actual employee_id
            'message' => $request->message,
            'sent_at' => now(),
            'is_active' => true,
            'remarks' => $request->remarks,
        ]);

        session()->flash('success', 'Bericht succesvol toegevoegd');
        return redirect()->route('communications.index');
    }

    public function edit(string $id)
    {
        $communication = Communication::findOrFail($id);
        return view('employee.communications.edit', compact('communication'));
    }

    public function update(Request $request, string $id)
    {
        $communication = Communication::findOrFail($id);

        $request->validate([
            'message' => 'required|string|max:255',
            'remarks' => 'nullable|string|max:255',
        ]);

        $communication->update([
            'message' => $request->message,
            'remarks' => $request->remarks,
        ]);

        session()->flash('success', 'Bericht succesvol bijgewerkt');
        return redirect()->route('communications.index');
    }

    public function destroy(string $id)
    {
        $communication = Communication::findOrFail($id);
        $communication->delete();

        session()->flash('success', 'Bericht succesvol verwijderd');
        return redirect()->route('communications.index');
    }
}
