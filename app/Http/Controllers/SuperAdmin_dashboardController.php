<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\AdminModel;
use\App\Models\MasyarakatModel;
use\App\Models\BeritaModel;
use\App\Models\PengaduanModel;

class SuperAdmin_dashboardController extends Controller
{
    public function index()
    {
        $admins = AdminModel::count();
        $masyarakats = MasyarakatModel::count();
        $beritas = BeritaModel::count();
        $pengaduans = PengaduanModel::count();
        return view('superadmin/dashboard',compact('admins','masyarakats','beritas','pengaduans'))->with('i');
    }
}
