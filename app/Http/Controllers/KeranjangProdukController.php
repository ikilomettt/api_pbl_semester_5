<?php

namespace App\Http\Controllers;

use App\Models\KeranjangProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KeranjangProdukController extends Controller
{
    public function index() {
        $keranjangProduk = KeranjangProduk::all();
        return response()->json($keranjangProduk);
    }

    public function show($id)
    {
        $keranjangProduk = KeranjangProduk::find($id);

        if (!$keranjangProduk) {
            return response()->json(['message' => 'keranjang not found'], 404);
        }

        return response()->json($keranjangProduk);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id_genteng' => 'required|exists:genteng,id',
            'total_produk' => 'required|integer',
            'sub_total' => 'required|integer'

        ]);


        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }


        $keranjangProduk = KeranjangProduk::create($request->all());
        return response()->json($keranjangProduk, 201);
    }

    public function update(Request $request, $id)
    {
        $keranjangProduk = KeranjangProduk::find($id);

        if (!$keranjangProduk) {
            return response()->json(['message' => 'Genteng not found'], 404);
        }

        $request->validate([
            'id_genteng' => 'required|exists:genteng,id',
            'total_produk' => 'required|integer',
            'sub_total' => 'required|integer'

        ]);

        $keranjangProduk->update($request->all());
        return response()->json($keranjangProduk);
    }

    public function destroy($id)
    {
        $keranjangProduk = KeranjangProduk::find($id);

        if (!$keranjangProduk) {
            return response()->json(['message' => 'Keranjang not found'], 404);
        }

        $keranjangProduk->delete();
        return response()->json(['message' => 'Keranjang deleted successfully']);
    }
}
