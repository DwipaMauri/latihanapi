<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $categories = category::create([
            'name' => $request->name,
        ]);

        return response()->json($categories, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::find($id);

        if (!$categories) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        return response()->json($categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $categories = category::find($id);

        if (!$categories) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        $categories->update([
            'name' => $request->name,
        ]);

        return response()->json($categories);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = category::find($id);

        if (!$categories) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }

        $categories->delete();

        return response()->json(['message' => 'Kategori deleted successfully']);
    }
}
