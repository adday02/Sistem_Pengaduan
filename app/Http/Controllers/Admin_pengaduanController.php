<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengaduanModel;


class Admin_pengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = PengaduanModel::all();
       return view('admin/pengaduan',compact('pengaduan'))->with('i');
    }

    public function update(Request $request, $id)
    {
        $data = array(
            
            'status'=>$request->status,
        );
        PengaduanModel::whereid_pengaduan($id)->update($data);
    return redirect('admin/pengaduan-admin');
    }

    public function destroy($id)
    {
        try{
            $datas = PengaduanModel::findOrfail($id);
            $datas->delete();
            return redirect('admin/pengaduan-admin')->with('success','Pengaduan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin/pengaduan-admin')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
