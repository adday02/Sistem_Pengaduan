<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengaduanModel;
use App\MOdels\MasyarakatModel;

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
        $foto = $request->file('foto');
        $new_name = rand().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $new_name);

        $data = array(
            'id_pengaduan'=>$request->id_pengaduan,
            'nik'=>$request->nik, 
            'deskripsi'=>$request->deskripsi,
            'lokasi'=>$request->lokasi,
            'foto'=>$new_name,
            'status'=>$request->status,
            
           
        );
        PengaduanModel::create($data);
        return redirect('masyarakat/pengaduan')->with('success','Berita berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            
            'nik'=>$request->nik, 
            'deskripsi'=>$request->deskripsi,
            'lokasi'=>$request->lokasi,
            'foto'=>$new_name,
            'status'=>$request->status,
            
           
        );
        PengaduanModel::whereid_pengaduan($id)->update($data);
        return redirect('masyarakat/pengaduan');
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
            return redirect('masyarakat/pengaduan')->with('success','Pengaduan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('masyarakat/pengaduan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
