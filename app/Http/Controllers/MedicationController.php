<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MedicationController extends Controller
{
    public function index()
    {
        $medications = Medication::all();
        return response()->json(['medications' => $medications], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:medications',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $medication = Medication::create($request->all());

        return redirect('/dashboard');
    }

    public function show(Medication $medication)
    {
        return response()->json(['medication' => $medication], 200);
    }

    public function update(Request $request, Medication $medication)
    {
        $request->validate([
            'name' => ['required', Rule::unique('medications')->ignore($medication->id)],
            'description' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $medication->update($request->all());

        return redirect('/dashboard');
    }

    public function destroy(Medication $medication)
    {
        $medication->delete();

        return redirect('/dashboard');
    }
}
