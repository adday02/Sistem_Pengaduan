<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdminModel extends Model
{
    protected $table = "superadmin";
    protected $primaryKey = 'id_seuperadmin';
    protected $fillable =['id_superadmin','password'];
}
