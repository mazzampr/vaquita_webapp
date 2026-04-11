<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PotonganGaji extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'potongan_gaji';
    protected $primaryKey = 'id_potongan_gaji';

    protected $fillable = ['id_gaji_pelatih','tipe_potongan','deskripsi','nominal','id_users_pembuat'];

    public function gajiPelatih(): BelongsTo { return $this->belongsTo(GajiPelatih::class, 'id_gaji_pelatih', 'id_gaji_pelatih'); }
    public function pembuat(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pembuat', 'id_users'); }
}
