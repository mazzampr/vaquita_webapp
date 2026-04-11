<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriLomba extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'kategori_lomba';
    protected $primaryKey = 'id_kategori_lomba';

    protected $fillable = ['id_event_lomba','nama_kategori','kelompok_usia','jarak_meter','gaya_renang'];

    public function eventLomba(): BelongsTo { return $this->belongsTo(EventLomba::class, 'id_event_lomba', 'id_event_lomba'); }
    public function peserta(): HasMany { return $this->hasMany(PesertaLomba::class, 'id_kategori_lomba', 'id_kategori_lomba'); }
}
