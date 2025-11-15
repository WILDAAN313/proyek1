<?php

namespace App\Http\Controllers;

use App\Models\Artikel;

class ArtikelController extends Controller 
{
    public function index() 
    {
        $title = "artikel";
        $slug = "artikel";

        $artikels = Artikel::latest()->get();

        $featured = Artikel::latest()->first();

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

        return view('pages.artikel-detail', compact('artikel'));
    }
}
