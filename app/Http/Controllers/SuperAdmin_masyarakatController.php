<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasyarakatModel;
use Validator;

class SuperAdmin_masyarakatController extends Controller
{
    public function index()
    {
        $masyarakats = MasyarakatModel::all();
        return view('superadmin/masyarakat',compact('masyarakats'))->with('i');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            
            'nik'          => 'required|unique:masyarakat',
            'foto'          => 'required|image:jpeg,jpg,png',
            'no_hp'           => 'required|string|min:10|max:15|regex:/^[0-9]*$/'
        ], [
           
           
            'nik.unique'           => 'Nik sudah terdaftar',
            'nik.required'          => 'Nik Wajib diisi',
            'foto.required'         => 'foto wajib diisi.',
            'foto.image'            => 'foto tidak valid.',
            'no_hp.required'      => 'Nomor hp belum diisi',
            'no_hp.regex'         => 'Format nomer hp harus berupa bilangan bulat',
            'no_hp.min'           => 'batas nomer telpon minimal 10 digit',
            'no_hp.max'           => 'batas nomer telpon maksimal 15 digit'
        ]);
        $foto = $request->file('foto');
        $new_name = rand().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $new_name);

        $data = array(
            'nik'=>$request->nik,
            'nama'=>$request->nama,
            'jk'=>$request->jk,
            'password'=>bcrypt($request->password),
            'no_hp'=>$request->no_hp,
            'foto'=>$new_name,
            'alamat'=>$request->alamat,
            'status_pengaduan'=>'Dalam Pengajuan',
        );
        MasyarakatModel::create($data);
        return redirect('superadmin\masyarakat')->with('success','masyarakat berhasil ditambah');
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            
           
            
            'foto'          => 'required|image:jpeg,jpg,png',
            'no_hp'           => 'required|string|min:10|max:15|regex:/^[0-9]*$/'
        ], [
           
           
           
            'foto.required'         => 'foto wajib diisi.',
            'foto.image'            => 'foto tidak valid.',
            'no_hp.required'      => 'Nomor hp belum diisi',
            'no_hp.regex'         => 'Format nomer hp harus berupa bilangan bulat',
            'no_hp.min'           => 'batas nomer telpon minimal 10 digit',
            'no_hp.max'           => 'batas nomer telpon maksimal 15 digit'
        ]);
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
                'password'=>bcrypt($request->password),
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat,
                'status_pengaduan'=>$request->status_pengaduan,
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
