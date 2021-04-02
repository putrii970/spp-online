<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'putri_pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = true;
    protected $fillable = ['petugas_id','nisn','tgl_bayar','bulan_dibayar','tahun_dibayar','spp_id','jumlah_bayar'];

    public function petugas_putri()
    {
        return $this->hasMany(Petugas::class);
    }

    public function siswa_putri()
    {
        return $this->hasMany(Siswa::class);
    }

    public function spp_putri()
    {
        return $this->hasMany(Spp::class);
    }

    public function detail_pembayaran_putri()
    {
        return $this->hasMany(DetailPembayaran::class);
    }
}
