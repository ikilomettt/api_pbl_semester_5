<?php

use App\Http\Controllers\AlamatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChekoutProdukController;
use App\Http\Controllers\GentengController;
use App\Http\Controllers\KategoriProdukController;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('genteng')->group(function () {
    Route::get('/', [GentengController::class, 'index']); // Menampilkan semua genteng
    Route::get('/{id}', [GentengController::class, 'show']); // Menampilkan genteng berdasarkan ID
    Route::post('/', [GentengController::class, 'store']); // Menambahkan genteng baru
    Route::put('/{id}', [GentengController::class, 'update']); // Memperbarui genteng berdasarkan ID
    Route::delete('/{id}', [GentengController::class, 'destroy']); // Menghapus genteng berdasarkan ID
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/alamat', [AlamatController::class, 'index']);
    Route::post('/alamat', [AlamatController::class, 'store']);
    Route::put('/alamat/{id}', [AlamatController::class, 'update']);
});

Route::get('kategori',[KategoriProdukController::class,'index']);
Route::get('kategori',[KategoriProdukController::class,'ProdukbyKategori']);
Route::post('kategori/tambah',[KategoriProdukController::class,'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/chekout', [ChekoutProdukController::class, 'index']);
    Route::get('/chekout/show', [ChekoutProdukController::class, 'show']);
    Route::post('/chekout/store', [ChekoutProdukController::class, 'store']);
    Route::post('/chekout/uploadBukti', [ChekoutProdukController::class, 'uploadBukti']);
});

// Route::post('/chekout/store', [ChekoutProdukController::class, 'store'])->middleware('auth:sanctum');
