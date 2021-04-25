<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasyarakatModel;

class SuperAdmin_masyarakatController extends Controller
{
    public function index()
    {
        $masyarakats = MasyarakatModel::all();
        return view('superadmin/masyarakat',compact('masyarakats'))->with('i');
    }
    
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $new_name = rand().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $new_name);

        $data = array(
            'nik'=>$request->nik,
            'nama'=>$request->nama,
            'jk'=>$request->jk,
            'password'=>$request->password,
            'no_hp'=>$request->no_hp,
            'foto'=>$new_name,
            'alamat'=>$request->alamat,
        );
        MasyarakatModel::create($data);
        return redirect('superadmin\masyarakat')->with('success','masyarakat berhasil ditambah');
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
        MasyarakatModel::wherenik($id)->update($data);
        }
            $data = array(
                'nama'=>$request->nama,
                'password'=>$request->password,
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat,
            );
        MasyarakatModel::wherenik($id)->update($data);
        return redirect('superadmin/masyarakat');
    }

    public function destroy($id)
    {
        try{
            $datas = MasyarakatModel::findOrfail($id);
            $datas->delete();
            return redirect('superadmin/masyarakat')->with('success','Masyarakat Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('superadmin/masyarakat')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
