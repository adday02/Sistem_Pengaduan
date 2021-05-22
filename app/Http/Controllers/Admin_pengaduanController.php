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
        $data = array(
            
            'status'=>$request->status,
        );
        PengaduanModel::whereid_pengaduan($id)->update($data);
    return redirect('admin/pengaduan');
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
            return redirect('admin/pengaduan')->with('success','Pengaduan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin/pengaduan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
