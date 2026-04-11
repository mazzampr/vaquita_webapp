<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfilSiswa extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'profil_siswa';
    protected $primaryKey = 'id_profil_siswa';
    protected $fillable = [
        'id_users',
        'nomor_hp',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'kontak_darurat_nama',
        'kontak_darurat_hp',
        'catatan_medis',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_users', 'id_users');
    }
}
