<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BeritaModel extends Model
{
    protected $table = "berita";
    protected $fillable =['id_berita','judul','deskripsi_berita','foto','tgl_berita'];

    public function getCreatedAtAttribute(){
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d M');
    }
}
