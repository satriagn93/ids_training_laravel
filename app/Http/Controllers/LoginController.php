<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        //memvalidasi masukkan, email dan password wajib diisi
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // mengambil data user berdasarkan email yang dikirm
        $user = User::where('email', $request->email)->first();

        //jika user dan password salah maka tampilkan pesan error
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'success'   => false,
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        //jika kondisi di atas bisa dilewati, selanjutnya buatlah token baru
        $token = $user->createToken('ApiToken')->plainTextToken;

        //isi response json berupa data user dan token
        $response = [
            'success'   => true,
            'user'      => $user,
            'token'     => $token
        ];

        //kembalikan atau tampilkan response
        return response($response, 201);
    }
}
