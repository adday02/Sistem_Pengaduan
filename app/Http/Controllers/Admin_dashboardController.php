<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaModel;
use App\Models\PengaduanModel;

class Admin_dashboardController extends Controller
{
    public function index()
    {
        $berita = BeritaModel::count();
        $pengaduan = PengaduanModel::count();
       
        return view('admin/dashboard',compact('berita','pengaduan'))->with('i');
    }
}
