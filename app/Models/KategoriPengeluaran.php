<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriPengeluaran extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'kategori_pengeluaran';
    protected $primaryKey = 'id_kategori_pengeluaran';

    protected $fillable = ['nama_kategori','tipe_pengeluaran'];

    public function transaksiPengeluaran(): HasMany { return $this->hasMany(TransaksiPengeluaran::class, 'id_kategori_pengeluaran', 'id_kategori_pengeluaran'); }
}
