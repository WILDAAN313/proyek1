<?php

namespace App\Http\Controllers;

use App\Models\Artikel;

class ArtikelController extends Controller 
{
    public function index() 
    {
        $title = "artikel";
        $slug = "artikel";

        $featured = Artikel::where('is_featured', true)->latest()->first();
        if (! $featured) {
            $featured = Artikel::latest()->first();
        }
        $artikels = Artikel::latest()->get();

        return view('pages.artikel', compact(
            'title',
            'slug',
            'artikels',
            'featured'
        ));
    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();

        $artikel->increment('dibaca');

        $artikels = Artikel::latest()->take(4)->get();

        return view('pages.artikel-detail', compact('artikel', 'artikels'));
    }
}
