<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';

    protected $fillable = ['id_paket_langganan','nama_kelas','tipe_kelas','level','kapasitas','id_lokasi_kolam','id_users_pelatih','aktif'];

    public function paketLangganan(): BelongsTo { return $this->belongsTo(PaketLangganan::class, 'id_paket_langganan', 'id_paket_langganan'); }
    public function lokasiKolam(): BelongsTo { return $this->belongsTo(LokasiKolam::class, 'id_lokasi_kolam', 'id_lokasi_kolam'); }
    public function pelatih(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pelatih', 'id_users'); }
    public function jadwalKelas(): HasMany { return $this->hasMany(JadwalKelas::class, 'id_kelas', 'id_kelas'); }
    public function sesiKelas(): HasMany { return $this->hasMany(SesiKelas::class, 'id_kelas', 'id_kelas'); }
}
