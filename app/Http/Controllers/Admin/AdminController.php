<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Menu;
use App\Models\Artikel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $userCount = User::count();
        $menuCount = Menu::count();
        $artikelCount = Artikel::count();

        $menus = Menu::latest()->take(5)->get();

             if ($request->ajax()) {
            return view('admin.dashboard', compact(
                'userCount',
                'menuCount',
                'artikelCount',
                'menus'
            ));
        }

        return view('layouts.admin', compact(
            'userCount',
            'menuCount',
            'artikelCount',
            'menus'
        ));
    }
}
