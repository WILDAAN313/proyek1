<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\kategori;
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
<<<<<<< HEAD
            'judul'  => 'required',
            'isi'    => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
=======
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'judul' => 'required',
            'konten' => 'required',
>>>>>>> 530378fdec9747212f25d0f45cb49dc5a49f559d
        ]);

        $fileName = null;
        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads/artikel'), $fileName);
        }

        Artikel::create([
            'judul'   => $request->judul,
            'slug'    => Str::slug($request->judul), 
            'isi'     => $request->isi,
            'gambar'  => $fileName,
            'penulis' => 'Admin',
            'dibaca'  => 0,
        ]);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);

        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
<<<<<<< HEAD
            'judul'  => 'required',
            'isi'    => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
=======
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'judul' => 'required',
            'konten' => 'required',
>>>>>>> 530378fdec9747212f25d0f45cb49dc5a49f559d
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
            'judul'   => $request->judul,
            'slug'    => Str::slug($request->judul),
            'isi'     => $request->isi,
            'gambar'  => $fileName,
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
