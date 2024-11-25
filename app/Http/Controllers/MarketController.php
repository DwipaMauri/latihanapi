<?php

namespace App\Http\Controllers;

use App\Models\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->query('keyword', '');
        $markets = Market::where('name', 'like', "%{$keyword}%")
        ->orWhere('price', 'like', "%{$keyword}%")
        ->orWhere('stock', 'like', "%{$keyword}%")
        ->orderBy('name', 'desc')
        ->orderBy('price', 'desc')
        ->orderBy('stock', 'desc')
        ->paginate(5);
        return response()->json($markets);
        // return response()->json(['markets' => $markets]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Market::create($request->all());
        return response()->json(['message' => 'Produk berhasil disimpan'], 201);
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|max:50',
            'stock' => 'required|integer|min:0',
            'brand_id' => 'required|integer',
            'category_id' => 'required|integer',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'stock.required' => 'Stok produk wajib diisi.',
            'stock.integer' => 'Stok harus berupa bilangan bulat.',
        ]);
        $markets = new Market($request->all());
        $markets->create([
            $markets->name = $request->input('name'),
            $markets->price = $request->input('price'),
            $markets->stock = $request->input('stock'),
        ]);
        return response()->json(['message' => 'Produk berhasil disimpan'], 201);
        //     'name' => 'required',
        //     'price' => 'required|numeric',
        //     'stock' => 'required|integer',
        // ]);

        // // Buat market baru berdasarkan data validasi
        // $markets = Market::create($validateData);
        // $markets = new Market($request->all());
        // $markets->create([
        //     $markets->name = $request->input('name'),
        //     $markets->price = $request->input('price'),
        //     $markets->stock = $request->input('stock'),
        // ]);
        // return response()->json(['message' => 'Produk berhasil dibuat', 'market' => $markets]);    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $markets = Market::findOrFail($id);
        return response()->json($markets);
        // $markets = Market::find($id);

        // if ($markets) {
        //     return response()->json(['market' => $markets]);
        // } else {
        //     return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $markets = Market::findOrFail($id);
        $markets->update($request->all());
        return response()->json(['message' => 'Produk berhasil diupdate'], 200);
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|max:50',
            'stock' => 'required|integer|min:0',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'stock.required' => 'Stok produk wajib diisi.',
            'stock.integer' => 'Stok harus berupa bilangan bulat.',
        ]);
        $markets = Market::find($id);
        if (!$markets) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $markets->update($validatedData);
        return response()->json(['message' => 'Produk berhasil diupdate', 'markets' => $markets]);
        // return response()->json(['message' => 'Produk berhasil diupdate'], 200);
        // $validateData = $request->validate([
        //     'name' => 'required',
        //     'price' => 'required|numeric',
        //     'stock' => 'required|integer',
        // ]);
        // $markets = Market::find($id);
        // if (!$markets) {
        //     return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        // }

        // $markets->update($validateData);
        // return response()->json(['message' => 'Produk berhasil di update', 'market' => $markets]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $markets = Market::findOrFail($id);
        $markets->delete();

        return response()->json(['message' => 'Produk berhasil dihapus'], 200);
        // $markets = Market::find($id);

        // if (!$markets) {
        //     return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        // }

        // $markets->delete();
        // return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}
