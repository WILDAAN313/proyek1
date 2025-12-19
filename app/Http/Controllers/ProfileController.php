<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function halamanProfile()
    {
        $title = "Profil";
        $user = Auth::user();
        return view('pages.profile', compact('user', 'title'));
    }
    public function update(Request $request, $id)
    {
        $user = Account::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required',
            'username' => "required|unique:accounts,username,$id",
            'email' => "required|email|unique:accounts,email,$id",
            'role' => 'required',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('photo');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            // hapus file lama (cek beberapa kemungkinan format path)
            if ($user->photo) {
                if (Storage::disk('public')->exists($user->photo)) {
                    Storage::disk('public')->delete($user->photo);
                } elseif (Storage::disk('public')->exists('profile/' . $user->photo)) {
                    Storage::disk('public')->delete('profile/' . $user->photo);
                }
            }

            // simpan path lengkap yang dikembalikan Storage
            $path = $request->file('photo')->store('profile', 'public'); // => "profile/xxx.jpg"
            $data['photo'] = $path;
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }
}
