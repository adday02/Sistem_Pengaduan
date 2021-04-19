<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = "admin";
    protected $fillable =['id_admin','username','password','jk','nama','no_hp','foto'];
}
