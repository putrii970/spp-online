<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;

class Petugas extends Authenticatable
{
    use Notifiable;
    protected $table = 'putri_petugas';
    protected $primaryKey = 'id_petugas';
    public $timestamps = true;
    protected $fillable = ['username', 'password', 'nama_petugas','level','deleted_at'];
}
