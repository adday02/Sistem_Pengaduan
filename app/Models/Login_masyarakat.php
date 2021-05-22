<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login_masyarakat extends Authenticatable
{
    protected $table="masyarakat";
    protected $primaryKey = 'nik';
    protected $fillable = ['nik','nama','jk','alamat','password','foto','no_hp','status_pengaduan' ]; //field tabel
    public $timestamps = false;
}