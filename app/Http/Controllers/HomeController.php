<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaModel;
use App\Models\AdminModel;


class HomeController extends Controller
{
    public function index()
    {
        
        return view('umum.homeutama');
    }

     public function tentangkami()
    {
        $admins = AdminModel::all();
        return view('umum.tentangkami',compact('admins'))->with('i');
    }

    public function kontak()
    {
        return view('umum.kontak');
    }

    public function berita()
    {
        $beritas = BeritaModel::all();
        return view('umum.berita',compact('beritas'))->with('i');
    }
}
