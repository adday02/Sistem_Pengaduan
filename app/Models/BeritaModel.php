<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BeritaModel extends Model
{
    protected $table = "berita";
    protected $fillable =['id_berita','id_admin','judul','deskripsi','foto','tgl'];

    public function AdminModel(){
        return $this->belongsTo('App\Models\AdminModel', 'id_admin');
    }

    public function getCreatedAtAttribute(){
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d M');
    }
}
