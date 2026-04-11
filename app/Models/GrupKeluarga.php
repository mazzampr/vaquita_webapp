<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GrupKeluarga extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'grup_keluarga';
    protected $primaryKey = 'id_grup_keluarga';

    protected $fillable = ['nama_grup','id_users_siswa_utama','id_paket_langganan'];

    public function siswaUtama(): BelongsTo { return $this->belongsTo(User::class, 'id_users_siswa_utama', 'id_users'); }
    public function paketLangganan(): BelongsTo { return $this->belongsTo(PaketLangganan::class, 'id_paket_langganan', 'id_paket_langganan'); }
    public function anggota(): HasMany { return $this->hasMany(AnggotaGrupKeluarga::class, 'id_grup_keluarga', 'id_grup_keluarga'); }
}
