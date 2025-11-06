<?php

namespace App\Http\Controllers;

class MenuController extends Controller {
    public function index() {
        $title = "Menu Sehat";
        $slug = "menu";
        return view('pages.menu', compact('title','slug'));
    }
}
