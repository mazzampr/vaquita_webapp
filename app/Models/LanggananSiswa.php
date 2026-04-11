<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LanggananSiswa extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'langganan_siswa';
    protected $primaryKey = 'id_langganan_siswa';

    protected $fillable = ['id_users_siswa','id_paket_langganan','mulai_tanggal','akhir_tanggal','total_sesi','sisa_sesi','status_langganan'];

    public function siswa(): BelongsTo { return $this->belongsTo(User::class, 'id_users_siswa', 'id_users'); }
    public function paketLangganan(): BelongsTo { return $this->belongsTo(PaketLangganan::class, 'id_paket_langganan', 'id_paket_langganan'); }
}
