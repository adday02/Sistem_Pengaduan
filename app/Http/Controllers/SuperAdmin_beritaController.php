<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaModel;

class SuperAdmin_beritaController extends Controller
{
    public function index()
    {
        $beritas = BeritaModel::all();
        return view('superadmin/berita',compact('beritas'))->with('i');
    }
    
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $new_name = rand().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $new_name);

        $data = array(
            'id_admin'=>$request->id_admin,
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'foto'=>$new_name,
            'tgl'=>$request->tgl,
        );
        BeritaModel::create($data);
        return redirect('superadmin\berita')->with('success','berita berhasil ditambah');
    }
    
    public function update(Request $request, $id)
    {
        $foto = $request->file('foto');
        if($request->hasFile('foto'))
        {
            $new_name = rand().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('foto'), $new_name);
            $data = array(            
                'foto'=>$new_name,
            );
        BeritaModel::whereid_berita($id)->update($data);
        }
            $data = array(
                'id_admin'=>$request->id_admin,
                'judul'=>$request->judul,
                'deskripsi'=>$request->deskripsi,
                'tgl'=>$request->tgl,
            );
        BeritaModel::whereid_berita($id)->update($data);
        return redirect('superadmin/berita');
    }

    public function destroy($id)
    {
        try{
            $datas = BeritaModel::findOrfail($id);
            $datas->delete();
            return redirect('superadmin/berita')->with('success','berita Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('superadmin/berita')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
