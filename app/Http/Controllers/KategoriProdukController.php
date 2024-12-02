<?php

namespace App\Http\Controllers;

use App\Models\Genteng;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriProdukController extends Controller
{
    public function index() {
        $kategoriProduk = KategoriProduk::all();
        return response()->json($kategoriProduk);
    }

    public function store(Request $request) {
        $request->validate([

            'nama_kategori' => 'required|string',
        ]);

        $kategoriProduk = KategoriProduk::create($request->all());

        return response()->create($kategoriProduk);
    }

    public function show(string $id)
    {
        $kategoriProduk = KategoriProduk::find($id);
        if (!$kategoriProduk) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($kategoriProduk);
    }

    public function update(Request $request, string $id)
    {
        $kategoriProduk = KategoriProduk::find($id);
        if (!$kategoriProduk) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $request->validate([
            'nama_kategori' => 'required|string',
        ]);

        $kategoriProduk->update($request->all());

        return response()->noContent();
    }

    public function destroy(string $id)
    {
        $kategoriProduk = KategoriProduk::find($id);
        if (!$kategoriProduk) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $kategoriProduk->delete();

        return response()->noContent();
    }

    public function ProdukbyKategori(Request $request) {
        $validator = Validator::make($request->all(),[
            'id_kategori' => 'required|exists:kategori_produks,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $kategoriProduk = Genteng::where('id_kategori', $request->id_kategori)
        ->with('kategoriProduk')
        ->get();

        return response()->json($kategoriProduk);

    }
}
