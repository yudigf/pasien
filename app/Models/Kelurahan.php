<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahans';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nama_kelurahan',
        'nama_kecamatan',
        'nama_kota',
    ];

}
