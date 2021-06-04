<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengaduanModel;


class Masyarakat_pengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = PengaduanModel::all();
        
        
        return view('masyarakat/pengaduan',compact('pengaduan'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'foto' => 'required|image:jpeg,jpg,png'
        ], [
            'foto.required'         => 'Foto wajib diisi.',
            'foto.image'            => 'Foto tidak valid.',
        ]);

    $validatedData['foto'] = ($validatedData['foto']);
        $foto = $request->file('foto');
        $new_name = rand().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $new_name);

        $data = array(
         
            'nik'=>$request->nik, 
            'deskripsi'=>$request->deskripsi,
            'lokasi'=>$request->lokasi,
            'foto'=>$new_name,
            'status'=>'Dalam Pengajuan',
            
           
        );
        PengaduanModel::create($data);
        return redirect('masyarakat/pengaduan-ms')->with('success','Berita berhasil ditambah');
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
        PengaduanModel::whereid_pengaduan($id)->update($data);
        }
        $data = array(   
            'deskripsi'=>$request->deskripsi,
            'lokasi'=>$request->lokasi,         
        );
        PengaduanModel::whereid_pengaduan($id)->update($data);
        return redirect('masyarakat/pengaduan-ms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $datas = PengaduanModel::findOrfail($id);
            $datas->delete();
            return redirect('masyarakat/pengaduan-ms')->with('success','Pengaduan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('masyarakat/pengaduan-ms')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
