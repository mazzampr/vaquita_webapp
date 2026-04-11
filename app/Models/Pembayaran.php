<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = ['id_invoice','metode_pembayaran','nominal','tanggal_bayar','bukti_bayar_path','status_verifikasi','id_users_verifikator','diverifikasi_pada','alasan_tolak'];

    public function invoice(): BelongsTo { return $this->belongsTo(Invoice::class, 'id_invoice', 'id_invoice'); }
    public function verifikator(): BelongsTo { return $this->belongsTo(User::class, 'id_users_verifikator', 'id_users'); }
}
