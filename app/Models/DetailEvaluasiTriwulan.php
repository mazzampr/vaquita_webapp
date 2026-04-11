<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailEvaluasiTriwulan extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'detail_evaluasi_triwulan';
    protected $primaryKey = 'id_detail_evaluasi_triwulan';

    protected $fillable = ['id_evaluasi_triwulan','id_users_siswa','id_users_pelatih','status_perkembangan','catatan'];

    public function evaluasiTriwulan(): BelongsTo { return $this->belongsTo(EvaluasiTriwulan::class, 'id_evaluasi_triwulan', 'id_evaluasi_triwulan'); }
    public function siswa(): BelongsTo { return $this->belongsTo(User::class, 'id_users_siswa', 'id_users'); }
    public function pelatih(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pelatih', 'id_users'); }
}
