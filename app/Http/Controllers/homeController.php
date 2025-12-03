<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $title = "Home";
        $slug = "home";
        $konten = "Selamat Datang di FitLife!";

        $featuredMenus = Menu::latest()->take(3)->get();
        $latestArticles = Artikel::latest()->take(3)->get();
        $heroHighlight = $latestArticles->first();

        return view('pages.home', compact(
            'title',
            'slug',
            'konten',
            'featuredMenus',
            'latestArticles',
            'heroHighlight'
        ));
    }

    public function kalkulator(Request $request) {
        $title = "Kalkulator";
        $slug = "kalkulator";
        $konten = "Kalkulator Ideal";

        if ($request->isMethod('post')) {
            $gender = $request->gender;
            $tinggi = $request->tinggi;
            $berat = $request->berat;

            $bmi = $berat / pow(($tinggi/100),2);
            $kategori = $bmi < 18.5 ? "Kurus" : ($bmi <= 24.9 ? "Normal" : ($bmi <= 29.9 ? "Overweight" : "Obesitas"));

            $hasil = "Gender: $gender <br> Tinggi: $tinggi cm <br> Berat: $berat kg <br> BMI: ".number_format($bmi,2)." <br> Kategori: $kategori";
            return redirect()->back()->with('hasil',$hasil);
        }

        return view('pages.kalkulator', compact('title','slug','konten'));
    }

    public function HalamanProfile()
    {
        return view('profile');
    }
}
