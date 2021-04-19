<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdminModel extends Model
{
    protected $table = "super_admin";
    protected $fillable =['id_super','password'];
}
