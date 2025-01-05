<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::all();
        return view('dashboard.residents.index', compact('residents'));
    }

    public function create()
    {
        return view('dashboard.residents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'number' => 'required|string|max:50',
            'currency_amount' => 'required|numeric|min:0',
            'date_of_birth' => 'required|date',
        ]);

        Resident::create($request->all());

        return redirect()->route('residents.index')->with('success', 'Resident created successfully.');
    }

    public function edit(Resident $resident)
    {
        return view('dashboard.residents.edit', compact('resident'));
    }

    public function update(Request $request, Resident $resident)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'number' => 'required|string|max:50',
            'currency_amount' => 'required|numeric|min:0',
            'date_of_birth' => 'required|date',
        ]);

        $resident->update($request->all());

        return redirect()->route('residents.index')->with('success', 'Resident updated successfully.');
    }

    public function destroy(Resident $resident)
    {
        $resident->delete();

        return redirect()->route('residents.index')->with('success', 'Resident deleted successfully.');
    }
}
