<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Admin;
use\App\Models\Masyarakat;
use\App\Models\Berita;
use\App\Models\Pengaduan;

class SuperAdmin_dashboardController extends Controller
{
    public function index()
    {
        $admins = Admin::count();
        $masyarakats = Masyarakat::count();
        $beritas = Berita::count();
        $pengaduans = Pengaduan::count();
        return view('superadmin/dashboard',compact('admin','masyarakats','beritas','pengaduans'))->with('i');
    }
}
