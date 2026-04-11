<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriPemasukan extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'kategori_pemasukan';
    protected $primaryKey = 'id_kategori_pemasukan';

    protected $fillable = ['nama_kategori','kategori_sistem'];

    public function transaksiPemasukan(): HasMany { return $this->hasMany(TransaksiPemasukan::class, 'id_kategori_pemasukan', 'id_kategori_pemasukan'); }
}
