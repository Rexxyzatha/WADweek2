<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArmadaKendaraan extends Model
{
    protected $table = 'armada_kendaraan';
    protected $primaryKey = 'Nomor_Plat';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'Nomor_Plat',
        'Merk',
        'Tahun_Pembuatan',
        'Tipe_Transmisi',
    ];
}