<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasyarakatModel extends Model
{
    protected $table = "masyarakat";
    protected $primaryKey = 'nik';
    protected $fillable =['nik','nama','jk','alamat','password','foto','no_hp'];
}
