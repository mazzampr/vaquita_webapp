<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaketLangganan extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'paket_langganan';
    protected $primaryKey = 'id_paket_langganan';
    protected $fillable = [
        'nama_paket',
        'tipe_paket',
        'level',
        'kuota_sesi',
        'durasi_hari',
        'harga',
        'aktif',
    ];

    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class, 'id_paket_langganan', 'id_paket_langganan');
    }

    public function langgananSiswa(): HasMany
    {
        return $this->hasMany(LanggananSiswa::class, 'id_paket_langganan', 'id_paket_langganan');
    }
}
