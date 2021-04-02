<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    protected $table = 'putri_bulan';
    protected $primaryKey = 'id_bulan';
    // public $timestamps = true;
    protected $fillable = ['nama_bulan'];

    public function putri_detail_pembayaran()
    {
        return $this->hasMany('App\DetailPembayaran');
        // return $this->hasMany(Kelas::class);
    }
}
