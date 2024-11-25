<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = brand::all();
        return response()->json($brands);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brands = brand::created([
            'name' => $request->name,
        ]);

        return response()->json($brands, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brands = brand::find($id);

        if (!$brands) {
            return response()->json(['message' => 'Brand tidak ditemukan'], 404);
        }

        return response()->json($brands);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brands = brand::find($id);

        if (!$brands) {
            return response()->json(['message' => 'Brand tidak ditemukan'], 404);
        }

        $brands->update([
            'name' => $request->name,
        ]);

        return response()->json($brands);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brands = brand::find($id);

        if (!$brands) {
            return response()->json(['message' => 'Brand tidak ditemukan'], 404);
        }

        $brands->delete();

        return response()->json(['message' => 'Brand deleted successfully']);
    }
}
