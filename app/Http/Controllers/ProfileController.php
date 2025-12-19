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
    public function update(Request $request)
    {
        $title = "Profil";
        $user = Auth::user();

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $file = $request->file('photo');
            $path = $file->store('profile', 'public');

            // Hapus file lama jika ada (kamu simpan path penuh di DB sekarang)
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            } elseif ($user->photo && Storage::disk('public')->exists('profile/' . $user->photo)) {
                // fallback kalau di DB masih ada hanya nama file
                Storage::disk('public')->delete('profile/' . $user->photo);
            }

            // Simpan path penuh ke DB (sesuai standar)
            $user->photo = $path;
            $user->save();

            return back()->with('success', 'Foto berhasil diperbarui!');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:accounts,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'birthdate' => 'nullable|date',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
        ]);

        $user->nama_lengkap = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthdate = $request->birthdate;
        $user->weight = $request->weight;
        $user->height = $request->height;
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
