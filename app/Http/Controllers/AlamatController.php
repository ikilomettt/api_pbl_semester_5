<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlamatController extends Controller
{
    public function index()
    {
        $alamat = Alamat::with('users')->get();
        return response()->json($alamat);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_penerima' => 'required|string',
            'nomor_telepon_penerima' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'dusun' => 'required|string',
            'desa' => 'required|string',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'spesifik_alamat' => 'required|string',
        ]);

        // Ambil pengguna yang terautentikasi
        $users = Auth::user();

        if (!$users) {
            return response()->json(['message' => 'Anda belum terautentikasi'], 401);
        }

        // Buat objek Alamat baru
        $alamat = new Alamat();
        $alamat->users_id = $users->id;
        $alamat->nama_penerima = $request->input('nama_penerima');
        $alamat->nomor_telepon_penerima = $request->input('nomor_telepon_penerima');
        $alamat->rt = $request->input('rt');
        $alamat->rw = $request->input('rw');
        $alamat->dusun = $request->input('dusun');
        $alamat->desa = $request->input('desa');
        $alamat->kecamatan = $request->input('kecamatan');
        $alamat->kabupaten = $request->input('kabupaten');
        $alamat->spesifik_alamat = $request->input('spesifik_alamat');

        // Coba simpan alamat dan tangani kesalahan
        try {
            $alamat->save();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan alamat', 'error' => $e->getMessage()], 500);
        }

        // Kembalikan respons sukses
        return response()->json(['message' => 'Alamat berhasil ditambahkan', 'alamat' => $alamat], 201);
    }

    public function show(string $id)
    {
        $alamat = Alamat::find($id);
        if (!$alamat) {
            return response()->json(['message' => 'Alamat not found'], 404);
        }

        return response()->json($alamat);
    }

    public function update(Request $request, string $id)
    {
        // Temukan alamat berdasarkan ID
        $alamat = Alamat::with('users')->find($id);

        // Jika alamat tidak ditemukan, kembalikan respons error
        if (!$alamat) {
            return response()->json(['message' => 'Alamat tidak ditemukan'], 404);
        }

        // Validasi input
        $request->validate([
            'nama_penerima' => 'required|string',
            'nomor_telepon_penerima' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'dusun' => 'required|string',
            'desa' => 'required|string',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'spesifik_alamat' => 'required|string',
        ]);

        // Ambil pengguna yang terautentikasi
        $users = Auth::user();

        // Periksa apakah pengguna terautentikasi
        if (!$users) {
            return response()->json(['message' => 'Anda belum terautentikasi'], 401);
        }

        // Perbarui data alamat dengan data baru dari request
        $alamat->nama_penerima = $request->input('nama_penerima');
        $alamat->nomor_telepon_penerima = $request->input('nomor_telepon_penerima');
        $alamat->rt = $request->input('rt');
        $alamat->rw = $request->input('rw');
        $alamat->dusun = $request->input('dusun');
        $alamat->desa = $request->input('desa');
        $alamat->kecamatan = $request->input('kecamatan');
        $alamat->kabupaten = $request->input('kabupaten');
        $alamat->spesifik_alamat = $request->input('spesifik_alamat');

        // Coba simpan perubahan dan tangani kesalahan
        try {
            $alamat->save();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui alamat', 'error' => $e->getMessage()], 500);
        }

        // Kembalikan respons sukses
        return response()->json(['message' => 'Alamat berhasil diperbarui', 'alamat' => $alamat], 200);
    }


    public function destroy(string $id)
    {
        $alamat = Alamat::find($id);
        if (!$alamat) {
            return response()->json(['message' => 'Alamat not found'], 404);
        }

        $alamat->delete();

        return response()->noContent();
    }
}
