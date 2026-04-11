<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransaksiPemasukan extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'transaksi_pemasukan';
    protected $primaryKey = 'id_transaksi_pemasukan';

    protected $fillable = ['id_kategori_pemasukan','sumber_tipe','sumber_id','nominal','tanggal_transaksi','id_lokasi_kolam','catatan','id_users_pembuat'];

    public function kategori(): BelongsTo { return $this->belongsTo(KategoriPemasukan::class, 'id_kategori_pemasukan', 'id_kategori_pemasukan'); }
    public function lokasiKolam(): BelongsTo { return $this->belongsTo(LokasiKolam::class, 'id_lokasi_kolam', 'id_lokasi_kolam'); }
    public function pembuat(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pembuat', 'id_users'); }
}
