<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GajiPelatih extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'gaji_pelatih';
    protected $primaryKey = 'id_gaji_pelatih';

    protected $fillable = ['id_periode_gaji','id_users_pelatih','jumlah_sesi','jumlah_siswa','gaji_kotor','total_potongan','gaji_bersih','status_gaji'];

    public function periodeGaji(): BelongsTo { return $this->belongsTo(PeriodeGaji::class, 'id_periode_gaji', 'id_periode_gaji'); }
    public function pelatih(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pelatih', 'id_users'); }
    public function potonganGaji(): HasMany { return $this->hasMany(PotonganGaji::class, 'id_gaji_pelatih', 'id_gaji_pelatih'); }
}
