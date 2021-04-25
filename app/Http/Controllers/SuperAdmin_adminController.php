<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
class SuperAdmin_adminController extends Controller
{
    public function index()
    {
        $admins = AdminModel::all();
        return view('superadmin\admin',compact('admins'))->with('i');
    }
    
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $new_name = rand().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $new_name);

        $data = array(
            'id_admin'=>$request->id_admin,
            'password'=>$request->password,
            'nama'=>$request->nama,
            'foto'=>$new_name,
            'alamat'=>$request->alamat,
        );
        AdminModel::create($data);
        return redirect('superadmin\admin')->with('success','admin berhasil ditambah');
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
        AdminModel::whereid_admin($id)->update($data);
        }
            $data = array(
                'password'=>$request->password,
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
            );
        AdminModel::whereid_admin($id)->update($data);
        return redirect('superadmin/admin');
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
            $datas = AdminModel::findOrfail($id);
            $datas->delete();
            return redirect('superadmin/admin')->with('success','Admin Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('superadmin/admin')->withErrors('Data gagal dihapus. Harap hapus data Jadwal yang terkait');
        }
    }
}
