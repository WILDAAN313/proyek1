<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request)
{
    $user = Auth::user();

    if ($request->hasFile('photo')) {

        $request->validate([
            'photo' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/profile', $filename);

        if ($user->photo && Storage::exists('public/profile/' . $user->photo)) {
            Storage::delete('public/profile/' . $user->photo);
        }

        $user->photo = $filename;
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
