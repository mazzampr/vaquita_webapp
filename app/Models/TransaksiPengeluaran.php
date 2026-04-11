<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransaksiPengeluaran extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'transaksi_pengeluaran';
    protected $primaryKey = 'id_transaksi_pengeluaran';

    protected $fillable = ['id_kategori_pengeluaran','nominal','tanggal_transaksi','id_lokasi_kolam','catatan','id_users_pembuat'];

    public function kategori(): BelongsTo { return $this->belongsTo(KategoriPengeluaran::class, 'id_kategori_pengeluaran', 'id_kategori_pengeluaran'); }
    public function lokasiKolam(): BelongsTo { return $this->belongsTo(LokasiKolam::class, 'id_lokasi_kolam', 'id_lokasi_kolam'); }
    public function pembuat(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pembuat', 'id_users'); }
}
