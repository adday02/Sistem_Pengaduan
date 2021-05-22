<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasyarakatModel;
use Validator;


class Masyarakat_profileController extends Controller
{
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            
            'foto' => 'image:jpeg,jpg,png'
        ], [
            'foto.image'            => 'Foto tidak valid.',
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
        if($request->has('jk'))
        {
            $data = array(
                'jk'=>$request->jk,
            );
        MasyarakatModel::wherenik($id)->update($data);
        }
        
        if($request->has('status'))
        {
            $data = array(
                'status'=>$request->status,
            );
            MasyarakatModel::wherenik($id)->update($data);
        }
            $data = array(
                'nama'=>$request->nama,    
                'alamat'=>$request->alamat,
                'password'=>$request->password,
                'no_hp'=>$request->no_hp,
            );
            MasyarakatModel::wherenik($id)->update($data);
        return redirect('masyarakat\pengaduan');
    }
}
