<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $table = 'putri_spp';
    protected $primaryKey = 'id_spp';
    public $timestamps = true;
    protected $fillable = ['tahun', 'nominal','deleted_at'];

    public function putri_siswa()
    {
        return $this->hasMany('App\Siswa');
        // return $this->hasMany(Siswa::class);
    }

    public function putri_pembayaran()
    {
        // return $this->hasMany('App\Pembayaran');
        return $this->hasMany(Pembayaran::class);
    }
}
