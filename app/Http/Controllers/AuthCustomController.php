<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCustomController extends Controller
{
    public function index()
    {
        return view('auth.form');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:accounts',
            'password' => 'required|string|min:4',
        ]);

        // Gunakan nama sebagai username (tanpa spasi, lowercase)
        $username = strtolower(str_replace(' ', '', $request->nama_lengkap));

        // Pastikan username unik
        $baseUsername = $username;
        $counter = 1;
        while (Account::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        // Tentukan role otomatis
        $role = ($baseUsername === 'admin') ? 'admin' : 'user';

        // Simpan akun baru
        $user = Account::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $username,
            'email' => $request->email,
            'password' => $request->password, // tanpa hash (sesuai kode awal kamu)
            'role' => $role,
        ]);

        return back()->with('success', "Pendaftaran berhasil! Username Anda: $username. Silakan login.");
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek manual username dan password
        $user = Account::where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            Auth::guard('web')->login($user);
            $request->session()->regenerate();

            // Arahkan sesuai role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('home');
        }

        return back()->with('error', 'Nama atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.index')->with('success', 'Anda telah berhasil logout.');
    }
}