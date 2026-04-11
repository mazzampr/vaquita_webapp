<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PeriodeGaji extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'periode_gaji';
    protected $primaryKey = 'id_periode_gaji';

    protected $fillable = ['mulai_periode','akhir_periode','status_periode','id_users_pembuat'];

    public function pembuat(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pembuat', 'id_users'); }
    public function gajiPelatih(): HasMany { return $this->hasMany(GajiPelatih::class, 'id_periode_gaji', 'id_periode_gaji'); }
}
