<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BeritaModel;
use App\Models\AdminModel;
use Validator;

class Admin_beritaController extends Controller
{

    public function index()
    {
        $berita = BeritaModel::all();
        $admin = AdminModel::all();
        return view('admin/berita',compact('berita','admin'))->with('i');
    }

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
            'id_admin'=>$request->id_admin,
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            
            'foto'=>$new_name,
        );
        BeritaModel::create($data);
        return redirect('admin/berita-admin')->with('success','Berita berhasil ditambah');
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
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,           
                      
        );
        BeritaModel::whereid_berita($id)->update($data);
    return redirect('admin/berita-admin');
    }
    public function destroy($id)
    {
        try{
            $datas = BeritaModel::findOrfail($id);
            $datas->delete();
            return redirect('admin/berita-admin')->with('success','Berita Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin/berita-admin')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
