<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Kejuruan extends Model
{
    protected $table = 'putri_jurusan';
    protected $primaryKey = 'id_jurusan';
    public $timestamps = true;
    protected $fillable = ['nama_jurusan', 'deleted_at'];
    // use SoftDeletes;

    public function putri_kelas()
    {
        return $this->hasMany('App\Kelas');
        // return $this->hasMany(Kelas::class);
    }
}
