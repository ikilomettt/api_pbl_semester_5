<?php

namespace App\Http\Controllers;

use App\Models\ChekoutProduk;
use App\Models\Genteng;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ChekoutProdukController extends Controller
{
    public function index() {
        $chekoutProduk = ChekoutProduk::all();
        return response()->json($chekoutProduk);
    }

    public function show($id)
    {
        $chekoutProduk = ChekoutProduk::find($id);

        if (!$chekoutProduk) {
            return response()->json(['message' => 'chekout not found'], 404);
        }

        return response()->json($chekoutProduk);
    }

        public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_genteng' => 'required|exists:gentengs,id',
            'id_alamat' => 'required|exists:alamats,id',
            'jumlah_barang' => 'required|numeric',
            'method_pembayaran' => 'required|in:transfer,cod',
            'pengantaran' => 'required|in:delivery,pickup',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $produk = Genteng::findOrFail($request->id_genteng);
        $sub_total = $produk->harga * $request->jumlah_barang;

        $chekoutProduk = ChekoutProduk::create([
            'id_user' => Auth::user()->id, // Mengambil id user yang login
            'id_genteng' => $request->id_genteng,
            'id_alamat' => $request->id_alamat,
            'jumlah_barang' => $request->jumlah_barang,
            'method_pembayaran' => $request->method_pembayaran,
            'pengantaran' => $request->pengantaran,
            'sub_total' => $sub_total,
            'status' => 'menunggu',
        ]);

        return response()->json($chekoutProduk, 201);
    }


    public function destroy($id)
    {
        $chekoutProduk = ChekoutProduk::find($id);

        if (!$chekoutProduk) {
            return response()->json(['message' => 'Genteng not found'], 404);
        }

        $chekoutProduk->delete();
        return response()->json(['message' => 'Genteng deleted successfully']);
    }

    public function uploadBukti(Request $request) {
        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => ['required', 'image', 'mimes:jpeg,png,jpg,heig', 'max:2048' ],
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        $chekoutProduk = ChekoutProduk::where(['id' => $request->id_checkout])->first();

        if($chekoutProduk == null) {
            return response()->json(['message' => 'data checkout tidak ditemukan'], 400);
        }

        $image = $request->file('bukti_pembayaran');
        $filename = time() . Str::random(10) . '.' . $image->getClientOriginalExtension();
        $path = 'public/bukti_pembayaran';
        $image->storeAs($path, $filename);

        $chekoutProduk->bukti_pembayaran = 'storage/app/public/bukti_pembayaran' . '/' . $filename;
        $chekoutProduk->save();

        return response()->json(['message' => 'bukti pembayaran berhasil diupload'], 200);
    }
}
