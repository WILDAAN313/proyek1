<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthCustomController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|string|min:4',
        ]);

        // generate username
        $username = strtolower(str_replace(' ', '', $request->nama_lengkap));
        $baseUsername = $username;
        $counter = 1;
        while (Account::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        $role = ($baseUsername === 'admin') ? 'admin' : 'user';

        // SIMPAN TANPA HASH (TIDAK AMAN, untuk dev only)
        Account::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username'     => $username,
            'email'        => $request->email,
            'password'     => $request->password,   // << plain text
            'role'         => $role,
            'is_active'    => false,
            'last_login_at' => null,
        ]);

        return back()->with('success', "Pendaftaran berhasil! Username Anda: $username.");
    }


    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = Account::where('username', $request->username)->first();

        if (! $user) {
            return back()->with('error', 'Nama atau password salah.');
        }

        if ($user->password !== $request->password) {
            return back()->with('error', 'Nama atau password salah.');
        }

        // login dan session
        Auth::login($user);
        $request->session()->regenerate();

        // update status
        $user->is_active = true;
        $user->last_login_at = now();
        $user->save();

        // redirect admin jika username mulai 'admin' atau role admin
        $usernameLower = \Illuminate\Support\Str::lower($user->username);
        $isAdminUsername = \Illuminate\Support\Str::startsWith($usernameLower, 'admin');
        $isAdminRole = \Illuminate\Support\Str::lower($user->role) === 'admin';

        if ($isAdminRole || $isAdminUsername) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('home');
    }


    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $account = Account::find($user->id);
            if ($account) {
                $account->is_active = false;
                $account->save();
            }
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.index')->with('success', 'Anda telah berhasil logout.');
    }
}
