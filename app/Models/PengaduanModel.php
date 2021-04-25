<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PengaduanModel extends Model
{
    protected $table = "pengaduan";
    protected $primaryKey = 'id_pengaduan';
    protected $fillable =['id_pengaduan','nik','deskripsi','lokasi','foto','tgl','status'];

    public function MasyarakatModel(){
        return $this->belongsTo('App\Models\MasyarakatModel', 'nik');
    }

     public function getCreatedAtAttribute(){
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d M');
    }
}
