<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    $title = "Home";
    $slug = "home";
    $konten = "Selamat Datang di FitLife!";
    return view('pages.home', compact('title','slug','konten'));
});

Route::match(['get','post'], '/kalkulator', function(){
    $title = "Kalkulator";
    $slug = "kalkulator";
    $konten = "Kalkulator Ideal";

    $hasil = "";
    if(request()->isMethod('post')){
        $gender = request('gender');
        $tinggi = request('tinggi');
        $berat = request('berat');

        $bmi = $berat / (($tinggi/100) * ($tinggi/100));
        $kategori = $bmi < 18.5 ? "Kurus" : ($bmi <= 24.9 ? "Normal / Ideal" : ($bmi <= 29.9 ? "Gemuk (Overweight)" : "Obesitas"));

        $hasil = "Jenis Kelamin: $gender <br>
                  Tinggi: $tinggi cm <br>
                  Berat: $berat kg <br>
                  BMI: " . number_format($bmi, 2) . "<br>
                  Kategori: $kategori";

        return redirect('/kalkulator')->with('hasil', $hasil);
    }

    return view('pages.kalkulator', compact('title','slug','konten'));
});

Route::get('/menu', function(){
    $title = "Menu Sehat";
    $slug = "menu";
    $konten = "Menu Sehat";
    return view('pages.menu', compact('title','slug','konten'));
});

Route::get('/artikel', function(){
    $title = "Artikel";
    $slug = "artikel";
    $konten = "Artikel Kesehatan";
    return view('pages.artikel', compact('title','slug','konten'));
});
