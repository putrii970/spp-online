<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    // use Notifiable;
    use Notifiable;

    protected $table = 'putri_siswa';
    protected $primaryKey = 'nisn';
    protected $keyType = 'string';
    public $timestamps = true;
    protected $fillable = ['nisn','nis','nama','putri_kelas_id_kelas','alamat','no_telp','spp_id_spp'];

    public function putri_pembayaran()
    {
        return $this->hasMany('App\Pembayaran');
    }

    public function putri_kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function putri_spp()
    {
        return $this->belongsTo('App\Spp', 'spp_id_spp', 'id_spp');    
    }
}
