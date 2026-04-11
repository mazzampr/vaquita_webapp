<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KehadiranPelatih extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'kehadiran_pelatih';
    protected $primaryKey = 'id_kehadiran_pelatih';

    protected $fillable = ['id_sesi_kelas','id_users_pelatih','cek_masuk_pada','cek_masuk_latitude','cek_masuk_longitude','terlambat','menit_terlambat'];

    public function sesiKelas(): BelongsTo { return $this->belongsTo(SesiKelas::class, 'id_sesi_kelas', 'id_sesi_kelas'); }
    public function pelatih(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pelatih', 'id_users'); }
}
