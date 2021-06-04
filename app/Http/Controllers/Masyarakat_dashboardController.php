<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Masyarakat_dashboardController extends Controller
{
    public function index()
    {
        return view('masyarakat/homeuser');
    }
}
