<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $title = 'Data Kategori';
        $slug = 'kategori';

        $kategori = Kategori::all();

        return view('admin.kategori.index', compact('title', 'slug', 'kategori'));
    }

    public function create()
    {
        $title = 'Tambah Kategori';
        $slug = 'Kategori';

        return view('admin.kategori.create', compact('title', 'slug'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(int $id)
    {
        $title = 'Update Kategori';
        $slug = 'kategori';

        $kategori = Kategori::findOrFail($id);

        return view('admin.kategori.edit', compact('title', 'slug', 'kategori'));
    }

    public function update(Request $request, int $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori,' . $id,
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(int $id)
    {
        Kategori::destroy($id);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
