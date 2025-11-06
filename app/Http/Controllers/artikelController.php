<?php

namespace App\Http\Controllers;

class ArtikelController extends Controller {
    public function index() {
        $title = "artikel";
        $slug = "artikel";
        return view('pages.artikel', compact('title','slug'));
    }
}
