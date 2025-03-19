<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function index()
    {
        $brands = Gender::all();
        return view('admin.genders', compact('genders'));
    }

    public function create()
    {
        return view('admin.genders');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:genders|max:255',
        ]);

        Gender::create(['name' => $request->name]);

        return redirect()->route('admin.genders')->with('success', 'Gender added successfully.');
    }

    public function edit(Gender $gender)
    {
        return view('admin.gender-edit', compact('gender'));
    }
    public function update(Request $request, Gender $gender)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:genders,name,' . $gender->id,
        ]);

        $gender->update(['name' => $request->name]);

        return redirect()->route('admin.genders')->with('success', 'Gender updated successfully.');
    }

    public function destroy(Gender $gender)
    {
        $gender->delete();

        return redirect()->route('admin.genders')->with('success', 'Gender deleted successfully.');
    }
}
