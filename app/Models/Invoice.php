<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'invoice';
    protected $primaryKey = 'id_invoice';

    protected $fillable = ['nomor_invoice','id_users_siswa','id_grup_keluarga','id_langganan_siswa','tanggal_invoice','jatuh_tempo','subtotal','diskon','total_tagihan','status_invoice','id_users_pembuat'];

    public function siswa(): BelongsTo { return $this->belongsTo(User::class, 'id_users_siswa', 'id_users'); }
    public function grupKeluarga(): BelongsTo { return $this->belongsTo(GrupKeluarga::class, 'id_grup_keluarga', 'id_grup_keluarga'); }
    public function langgananSiswa(): BelongsTo { return $this->belongsTo(LanggananSiswa::class, 'id_langganan_siswa', 'id_langganan_siswa'); }
    public function pembuat(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pembuat', 'id_users'); }
    public function item(): HasMany { return $this->hasMany(ItemInvoice::class, 'id_invoice', 'id_invoice'); }
    public function pembayaran(): HasMany { return $this->hasMany(Pembayaran::class, 'id_invoice', 'id_invoice'); }
}
