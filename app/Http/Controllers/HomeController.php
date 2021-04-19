<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('umum.home');
    }

     public function tentangkami()
    {
        return view('umum.tentangkami');
    }

    public function kontak()
    {
        return view('umum.kontak');
    }

    public function berita()
    {
        return view('umum.berita');
    }
}
