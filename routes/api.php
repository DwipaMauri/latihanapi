<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum','logs'])->group(function () {
    // return $request->user();
    Route::apiResource('brands', BrandController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('markets', MarketController::class);
    Route::post('/logout', [UserController::class, 'logout']);
});

Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('register', [UserController::class, 'register'])->name('register');


// // Route untuk menampilkan daftar produk
// Route::get('/markets', [MarketController::class, 'index'])->name('markets.index');

// // Route untuk menampilkan formulir tambah produk 
// Route::get('/markets/create', [MarketController::class, 'create'])->name('markets.create');

// // Route untuk menyimpan produk baru
// Route::post('/markets', [MarketController::class, 'store'])->name('markets.store');

// // Route untuk menampilkan detail produk berdasarkan ID
// Route::get('/markets/{id}', [MarketController::class, 'show'])->name('markets.show');

// // Route untuk formulir edit produk berdasarkan ID
// Route::get('/markets/{id}/edit', [MarketController::class,  'edit'])->name('markets.edit');

// // Route untuk memperbarui produk berdasarkan ID 
// Route::put('/markets/{id}', [MarketController::class, 'update'])->name('markets.update');

// // Route untuk menghapus produk berdasarkan ID
// Route::delete('/markets/{id}', [MarketController::class, 'destroy'])->name('markets.destroy');
