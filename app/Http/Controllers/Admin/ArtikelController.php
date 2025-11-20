<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $kategori = Kategori::all();
        return view('admin.artikel.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori'    => 'nullable|string|max:255',
            'judul'       => 'required|string|max:255',
            'penulis'     => 'nullable|string|max:255',
            'isi'         => 'required',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $slug = $this->generateUniqueSlug($request->judul);
        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create([
            'kategori'    => $request->kategori,
            'judul'       => $request->judul,
            'slug'        => $slug,
            'isi'         => $request->isi,
            'gambar'      => $gambarPath,
            'penulis'     => $request->penulis ?: 'Admin',
            'is_featured' => $request->boolean('is_featured', false),
            'dibaca'      => 0,
        ]);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $artikel  = Artikel::findOrFail($id);

        $kategori = Kategori::all();

        return view('admin.artikel.edit', compact('artikel', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori'    => 'nullable|string|max:255',
            'judul'       => 'required|string|max:255',
            'penulis'     => 'nullable|string|max:255',
            'isi'         => 'required',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $artikel = Artikel::findOrFail($id);
        $slug    = $this->generateUniqueSlug($request->judul, $artikel->id);
        $gambarPath = $artikel->gambar;

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
                Storage::disk('public')->delete($artikel->gambar);
            }

            $gambarPath = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update([
            'kategori'    => $request->kategori,
            'judul'       => $request->judul,
            'slug'        => $slug,
            'isi'         => $request->isi,
            'gambar'      => $gambarPath,
            'penulis'     => $request->penulis ?: 'Admin',
            'is_featured' => $request->boolean('is_featured', $artikel->is_featured),
        ]);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }

    private function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug ?: Str::random(8);
        $counter = 1;

        while (
            Artikel::when($ignoreId, function ($query) use ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            })->where('slug', $slug)->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
