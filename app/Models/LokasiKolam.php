<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LokasiKolam extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'lokasi_kolam';
    protected $primaryKey = 'id_lokasi_kolam';
    protected $fillable = [
        'nama_lokasi',
        'alamat',
        'kota',
        'provinsi',
        'latitude',
        'longitude',
        'radius_meter',
        'tautan_google_maps',
        'aktif',
    ];

    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class, 'id_lokasi_kolam', 'id_lokasi_kolam');
    }
}
