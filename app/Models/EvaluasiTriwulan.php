<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EvaluasiTriwulan extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'evaluasi_triwulan';
    protected $primaryKey = 'id_evaluasi_triwulan';

    protected $fillable = ['mulai_periode','akhir_periode','id_users_penghasil'];

    public function penghasil(): BelongsTo { return $this->belongsTo(User::class, 'id_users_penghasil', 'id_users'); }
    public function detail(): HasMany { return $this->hasMany(DetailEvaluasiTriwulan::class, 'id_evaluasi_triwulan', 'id_evaluasi_triwulan'); }
}
