<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Menu;
use App\Models\Artikel;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $userCount = Account::count();
        $activeUserCount = Account::where('is_active', true)->count();
        $menuCount = Menu::count();
        $artikelCount = Artikel::count();

        $menus = Menu::latest()->take(5)->get();
        $latestUsers = Account::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'userCount',
            'activeUserCount',
            'menuCount',
            'artikelCount',
            'menus',
            'latestUsers'
        ));
    }
}