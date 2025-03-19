<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:brands|max:255',
        ]);

        Brand::create(['name' => $request->name]);

        return redirect()->route('admin.brands')->with('success', 'Brand added successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand-edit', compact('brand'));
    }
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
        ]);

        $brand->update(['name' => $request->name]);

        return redirect()->route('admin.brands')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('admin.brands')->with('success', 'Brand deleted successfully.');
    }
}
