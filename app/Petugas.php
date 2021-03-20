<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'putri_petugas';
    protected $primaryKey = 'id_petugas';
    public $timestamps = true;
    protected $fillable = ['username', 'password', 'nama_petugas','level','deleted_at'];
}
