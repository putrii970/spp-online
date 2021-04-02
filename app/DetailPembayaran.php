<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPembayaran extends Model
{
    protected $table = 'putri_detail_pembayaran';
    protected $primaryKey = 'id_detail_pembayaran';
    // public $timestamps = true;
    protected $fillable = ['pembayaran_id', 'bulan_id', 'tahun_bayar', 'harga_spp'];

    public function bulan_putri()
    {
        return $this->belongsTo('App\Bulan', 'bulan_id', 'id_bulan');    
        // return $this->belongsTo(Kejuruan::class);
    }

    public function pembayaran_putri()
    {
        return $this->belongsTo('App\Pembayaran', 'pembayaran_id', 'id_pembayaran');    
        // return $this->belongsTo(Kejuruan::class);
    }
}
