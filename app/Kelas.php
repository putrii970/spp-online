<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'putri_kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps = true;
    protected $fillable = ['nama_kelas','jurusan_id'];

    public function siswa()
    {
        return $this->hasMany('App\Siswa');
        // return $this->hasMany(Siswa::class);
    }

    public function kejuruan_putri()
    {
        return $this->belongsTo('App\Kejuruan', 'jurusan_id', 'id_jurusan');    
        // return $this->belongsTo(Kejuruan::class);
    }

    
}
