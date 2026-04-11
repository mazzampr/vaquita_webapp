<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SesiKelas extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'sesi_kelas';
    protected $primaryKey = 'id_sesi_kelas';

    protected $fillable = ['id_kelas','tanggal_sesi','mulai_pada','selesai_pada','id_lokasi_kolam','id_users_pelatih','status_sesi','catatan'];

    public function kelas(): BelongsTo { return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas'); }
    public function lokasiKolam(): BelongsTo { return $this->belongsTo(LokasiKolam::class, 'id_lokasi_kolam', 'id_lokasi_kolam'); }
    public function pelatih(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pelatih', 'id_users'); }
    public function kehadiranSiswa(): HasMany { return $this->hasMany(KehadiranSiswa::class, 'id_sesi_kelas', 'id_sesi_kelas'); }
}
