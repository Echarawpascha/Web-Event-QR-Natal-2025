<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * Tampilkan form registrasi peserta
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); // pastikan nanti kita bikin file blade ini
    }

    /**
     * Proses registrasi peserta
     */
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan user baru dengan role "peserta"
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'peserta', // 🔑 default role peserta
        ]);

        // Login otomatis setelah registrasi
        auth()->login($user);

        // Redirect ke dashboard peserta
        return redirect()->route('peserta.dashboard')->with('success', 'Registrasi berhasil, selamat datang!');
    }
}