<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengaduanModel;

class SuperAdmin_pengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = PengaduanModel::all();
        return view('superadmin/pengaduan',compact('pengaduans'))->with('i');
    }
    
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $new_name = rand().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $new_name);

        $data = array(
            'nik'=>$request->nik,
            'deskripsi'=>$request->deskripsi,
            'lokasi'=>$request->lokasi,
            'tgl'=>$request->tgl,
            'status'=>$request->status,
            'foto'=>$new_name,
        );
        PengaduanModel::create($data);
        return redirect('superadmin\pengaduan')->with('success','pengaduan berhasil ditambah');
    }
    
    public function update(Request $request, $id)
    {            
        $data = array(
            'status'=>$request->status,
        );
        PengaduanModel::whereid_pengaduan($id)->update($data);
        return redirect('superadmin/pengaduan');
    }

    public function destroy($id)
    {
        try{
            $datas = PengaduanModel::findOrfail($id);
            $datas->delete();
            return redirect('superadmin/pengaduan')->with('success','Pengaduan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('superadmin/pengaduan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
