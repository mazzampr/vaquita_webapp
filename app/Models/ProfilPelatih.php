<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfilPelatih extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'profil_pelatih';
    protected $primaryKey = 'id_profil_pelatih';
    protected $fillable = [
        'id_users',
        'nomor_hp',
        'tanggal_bergabung',
        'spesialisasi',
        'tipe_gaji_dasar',
        'nominal_gaji_dasar',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_users', 'id_users');
    }
}
