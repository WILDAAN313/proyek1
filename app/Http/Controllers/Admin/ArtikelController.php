<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = Artikel::latest()->paginate(10);
        return view('admin.artikel.index', compact('data'));
    }
    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'nullable|exists:kategori,id_kategori',
            'judul'       => 'required|string|max:255',
            'penulis'     => 'nullable|string|max:255',
            'isi'         => 'required',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fileName = null;
        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/artikel'), $fileName);
        }

        Artikel::create([
            'id_kategori' => $request->id_kategori,
            'judul'       => $request->judul,
            'slug'        => Str::slug($request->judul),
            'isi'         => $request->isi,
            'gambar'      => $fileName,
            'penulis'     => $request->penulis ?: 'Admin',
            'dibaca'      => 0,
        ]);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $artikel  = Artikel::findOrFail($id);

        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'nullable|exists:kategori,id_kategori',
            'judul'       => 'required|string|max:255',
            'penulis'     => 'nullable|string|max:255',
            'isi'         => 'required',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $artikel = Artikel::findOrFail($id);

        if ($request->hasFile('gambar')) {

            if ($artikel->gambar && file_exists(public_path('uploads/artikel/' . $artikel->gambar))) {
                unlink(public_path('uploads/artikel/' . $artikel->gambar));
            }

            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/artikel'), $fileName);

        } else {
            $fileName = $artikel->gambar;
        }

        $artikel->update([
            'id_kategori' => $request->id_kategori,
            'judul'       => $request->judul,
            'slug'        => Str::slug($request->judul),
            'isi'         => $request->isi,
            'gambar'      => $fileName,
            'penulis'     => $request->penulis ?: 'Admin',
        ]);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->gambar && file_exists(public_path('uploads/artikel/' . $artikel->gambar))) {
            unlink(public_path('uploads/artikel/' . $artikel->gambar));
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}
