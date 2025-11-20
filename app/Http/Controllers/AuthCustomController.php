<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
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

        $payload = [
            'nama_lengkap' => $request->nama_lengkap,
            'username'     => $username,
            'email'        => $request->email,
            'password'     => $request->password,   // << plain text
            'role'         => $role,
        ];

        if (Schema::hasColumn('accounts', 'is_active')) {
            $payload['is_active'] = false;
        }
        if (Schema::hasColumn('accounts', 'last_login_at')) {
            $payload['last_login_at'] = null;
        }

        // SIMPAN TANPA HASH (TIDAK AMAN, untuk dev only)
        Account::create($payload);

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

        // update status jika kolom tersedia
        $dirty = false;
        if (Schema::hasColumn('accounts', 'is_active')) {
            $user->is_active = true;
            $dirty = true;
        }
        if (Schema::hasColumn('accounts', 'last_login_at')) {
            $user->last_login_at = now();
            $dirty = true;
        }
        if ($dirty) {
            $user->save();
        }

        // tentukan tujuan redirect
        $usernameLower   = \Illuminate\Support\Str::lower($user->username);
        $hasRoleColumn   = \Illuminate\Support\Facades\Schema::hasColumn('accounts', 'role');
        $isAdminRole     = $hasRoleColumn && strcasecmp($user->role ?? '', 'admin') === 0;
        $isAdminUsername = \Illuminate\Support\Str::startsWith($usernameLower, 'admin');

        $target = ($isAdminRole || $isAdminUsername)
            ? route('admin.dashboard')
            : route('home');

        // redirect ke intended (jika sebelumnya akses halaman terproteksi) atau fallback target
        return redirect()->intended($target);
    }


    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $account = Account::find($user->id);
            if ($account) {
                if (Schema::hasColumn('accounts', 'is_active')) {
                    $account->is_active = false;
                }
                $account->save();
            }
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.index')->with('success', 'Anda telah berhasil logout.');
    }
}
