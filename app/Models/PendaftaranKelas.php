<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PendaftaranKelas extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'pendaftaran_kelas';
    protected $primaryKey = 'id_pendaftaran_kelas';

    protected $fillable = ['id_users_siswa','id_kelas','id_langganan_siswa','terdaftar_pada','aktif'];

    public function siswa(): BelongsTo { return $this->belongsTo(User::class, 'id_users_siswa', 'id_users'); }
    public function kelas(): BelongsTo { return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas'); }
    public function langgananSiswa(): BelongsTo { return $this->belongsTo(LanggananSiswa::class, 'id_langganan_siswa', 'id_langganan_siswa'); }
}
