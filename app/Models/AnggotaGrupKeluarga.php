<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnggotaGrupKeluarga extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'anggota_grup_keluarga';
    protected $primaryKey = 'id_anggota_grup_keluarga';

    protected $fillable = ['id_grup_keluarga','id_users_siswa','hubungan'];

    public function grupKeluarga(): BelongsTo { return $this->belongsTo(GrupKeluarga::class, 'id_grup_keluarga', 'id_grup_keluarga'); }
    public function siswa(): BelongsTo { return $this->belongsTo(User::class, 'id_users_siswa', 'id_users'); }
}
