<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'no_telpon' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()],401);
        }

        $user = new User();
        $user->no_telpon = $request->input('no_telpon');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return response()->json(['success' => true, 'message' => 'Berhasil Register']);
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_telpon' => 'required|string', // Pastikan nama kolom sesuai
            'password' => 'required|string',
        ]);

        // Mencari pengguna berdasarkan nomor telepon
        $user = User::where('no_telpon', $request->no_telpon)->first(); // Pastikan nama kolom sesuai

        if (!$user) {
            throw ValidationException::withMessages([
                'no_telpon' => ['Nomor telepon tidak ditemukan.'] // Pesan yang lebih informatif
            ]);
        }

        // Memeriksa kecocokan password
        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['Password salah.'] // Pesan yang lebih informatif
            ]);
        }

        // Membuat token untuk pengguna
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'jwt-token' => $token,
            'user' => $user,
        ], 200); // Menambahkan status HTTP 200
    }
}
