<?php

namespace App\Http\Controllers;

use App\Models\Genteng;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class GentengController extends Controller
{
    public function index()
    {
        $gentengs = Genteng::all(); // Mengambil semua data genteng
        return response()->json($gentengs);
    }

    public function show($id)
    {
        $genteng = Genteng::find($id);

        if (!$genteng) {
            return response()->json(['message' => 'Genteng not found'], 404);
        }

        return response()->json($genteng);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'gambar' => 'string',
            'nama_genteng' => 'string|max:255',
            'nama_perusahaan' => 'string|max:255',
            'harga' => 'numeric',
            'deskripsi' => 'string',
            'panjang_genteng' => 'string',
            'lebar_genteng' => 'string',
            'tebal_genteng' => 'string',
            'warna_genteng' => 'string',
            'bahan_pembuatan' => 'string',
            'stok' => 'string',
            'id_kategori' => 'required|integer|exists:kategori_produks,id',

        ]);


        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }


        $genteng = Genteng::create($request->all());
        return response()->json($genteng, 201);
    }

    public function update(Request $request, $id)
    {
        $genteng = Genteng::find($id);

        if (!$genteng) {
            return response()->json(['message' => 'Genteng not found'], 404);
        }

        $request->validate([
            'gambar' => 'string',
            'nama_genteng' => 'string|max:255',
            'nama_perusahaan' => 'string|max:255',
            'harga' => 'numeric',
            'deskripsi' => 'string',
            'panjang_genteng' => 'string',
            'lebar_genteng' => 'string',
            'tebal_genteng' => 'string',
            'warna_genteng' => 'string',
            'bahan_pembuatan' => 'string',
            'stok' => 'string',

        ]);

        $genteng->update($request->all());
        return response()->json($genteng);
    }

    public function destroy($id)
    {
        $genteng = Genteng::find($id);

        if (!$genteng) {
            return response()->json(['message' => 'Genteng not found'], 404);
        }

        $genteng->delete();
        return response()->json(['message' => 'Genteng deleted successfully']);
    }
}
