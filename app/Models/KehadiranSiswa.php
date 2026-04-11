<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KehadiranSiswa extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'kehadiran_siswa';
    protected $primaryKey = 'id_kehadiran_siswa';

    protected $fillable = ['id_sesi_kelas','id_users_siswa','status_kehadiran','cek_masuk_pada','cek_masuk_latitude','cek_masuk_longitude','id_users_pelatih_pemeriksa','catatan'];

    public function sesiKelas(): BelongsTo { return $this->belongsTo(SesiKelas::class, 'id_sesi_kelas', 'id_sesi_kelas'); }
    public function siswa(): BelongsTo { return $this->belongsTo(User::class, 'id_users_siswa', 'id_users'); }
    public function pemeriksa(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pelatih_pemeriksa', 'id_users'); }
}
