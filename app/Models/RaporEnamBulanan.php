<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RaporEnamBulanan extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'rapor_enam_bulanan';
    protected $primaryKey = 'id_rapor_enam_bulanan';

    protected $fillable = ['id_users_siswa','id_users_pelatih','mulai_periode','akhir_periode','evaluasi','rekomendasi','dikirim_pada'];

    public function siswa(): BelongsTo { return $this->belongsTo(User::class, 'id_users_siswa', 'id_users'); }
    public function pelatih(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pelatih', 'id_users'); }
}
