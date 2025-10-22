<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kalkulatorController extends Controller
{
    public function index () {
        return view ('kalkulator');
}
}
