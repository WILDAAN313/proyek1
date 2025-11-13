<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menu = Menu::latest()->paginate(10);
        return view('admin.menu.index', compact('menu')); // full page
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'deskripsi' => 'required',
        ]);

        Menu::create($request->only('nama_menu', 'deskripsi'));
        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu')); // full page
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu' => 'required',
            'deskripsi' => 'required',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($request->only('nama_menu', 'deskripsi'));

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil diperbarui');
    }

    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil dihapus');
    }
}
