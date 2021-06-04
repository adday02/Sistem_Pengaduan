<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\AdminModel;
use App\models\SuperAdminModel;
use App\models\MasyarakatModel;
use Auth;

class LoginController extends Controller
{
    function masuk(Request $kiriman)
    {
        $data1=AdminModel::where('id_admin',$kiriman->username)->where('password',$kiriman->password)->get();
        $data2=SuperAdminModel::where('id_superadmin',$kiriman->username)->where('password',$kiriman->password)->get();
        $data3=MasyarakatModel::where('nik',$kiriman->username)->where('password',$kiriman->password)->get();

        if (count($data1)>0) {
    		Auth::guard('admin')->LoginUsingId($data1[0]['id_admin']);
            return redirect('/admin/dashboard-admin');
    	}
    	else if (count($data2)>0) {
    		Auth::guard('superadmin')->LoginUsingId($data2[0]['id_superadmin']);
            return redirect('/superadmin/dashboard');
    	}
    	else if (count($data3)>0) {
    		Auth::guard('masyarakat')->LoginUsingId($data3[0]['nik']);
    		return redirect('/masyarakat/pengaduan-ms');
    	}
    	else{
    		return redirect('/login')->with('Login Gagal');
    	}
    }

    function keluar()
    {
        if (Auth::guard('admin')->check()) {
    		Auth::guard('admin')->logout();
    	}else if (Auth::guard('superadmin')->check()) {
    		Auth::guard('superadmin')->logout();
		}else if (Auth::guard('masyarakat')->check()) {
    		Auth::guard('masyarakat')->logout();
        }
		return redirect('/login');
    }
}
