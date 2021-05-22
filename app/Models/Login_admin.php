<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login_admin extends Authenticatable
{
    protected $table="admin";
    protected $primaryKey = 'id_admin';
    protected $fillable = ['id_admin','password','nama','alamat','foto' ]; //field tabel
    public $timestamps = false;
}