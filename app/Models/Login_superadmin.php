<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login_superadmin extends Authenticatable
{
    protected $table="superadmin";
    protected $primaryKey = 'id_superadmin';
    protected $fillable = ['id_superadmin','password']; //field tabel
    public $timestamps = false;
}