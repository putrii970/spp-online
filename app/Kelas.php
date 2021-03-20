<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'putri_kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps = true;
    protected $fillable = ['nama_kelas','jurusan_id'];

    public function kejuruan_putri()
    {
        return $this->hasMany(Kejuruan::class);
    }
}
