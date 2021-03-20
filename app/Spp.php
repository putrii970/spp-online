<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $table = 'putri_spp';
    protected $primaryKey = 'id_spp';
    public $timestamps = true;
    protected $fillable = ['tahun', 'nominal','deleted_at'];
}
