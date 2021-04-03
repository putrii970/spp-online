<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'putri_pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = true;
    protected $fillable = ['petugas_id','siswa_id','nisn','tgl_bayar','bulan_dibayar','tahun_dibayar','spp_id','jumlah_bayar'];

    public function petugas_putri()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function putri_siswa()
    {
        return $this->belongsTo('App\Siswa', 'nisn', 'nisn');
    }

    public function putri_detail_pembayaran()
    {
        return $this->hasMany('App\DetailPembayaran');
    }

    public function spp_putri()
    {
        return $this->belongsTo(Spp::class);
    }

    public function detail_pembayaran_putri()
    {
        return $this->hasMany(DetailPembayaran::class);
    }
}
