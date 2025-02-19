<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{


    // Toon alle trips
    public function index()
    {
        return view('trips.index', [
            'trips' => Trip::with(['employee', 'departure', 'destination'])->get()
        ]);
    }

    // Toon formulier om een trip toe te voegen
    public function create()
    {
        return view('trips.create');
    }

    // Sla een nieuwe trip op
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|integer',
            'departure_id' => 'required|integer',
            'destination_id' => 'required|integer',
            'flight_number' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'arrival_date' => 'required|date',
            'arrival_time' => 'required|date_format:H:i',
            'trip_status' => 'required|string',
            'remarks' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        Trip::create($request->all());

        session()->flash('success', 'Trip succesvol aangemaakt.');
        return redirect()->route('trips.index');
    }

    // Toon formulier om een trip te bewerken
    public function edit(Trip $trip)
    {
        return view('trips.edit', compact('trip'));
    }

    // Update een bestaande trip
    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'employee_id' => 'required|integer',
            'departure_id' => 'required|integer',
            'destination_id' => 'required|integer',
            'flight_number' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'arrival_date' => 'required|date',
            'arrival_time' => 'required|date_format:H:i',
            'trip_status' => 'required|string',
            'remarks' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $trip->update($request->all());

        session()->flash('success', 'Trip succesvol bijgewerkt.');
        return redirect()->route('trips.index');
    }

    // Verwijder een trip
    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        session()->flash('success', 'Trip succesvol verwijderd.');
        return redirect()->route('trips.index');
    }

    // Toon trips op het dashboard
    public function dashboardIndex()
    {
        return view('dashboard.trips', [
            'trips' => Trip::with(['employee', 'departure', 'destination'])->get()
        ]);
    }
}
