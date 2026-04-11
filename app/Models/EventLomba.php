<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventLomba extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'event_lomba';
    protected $primaryKey = 'id_event_lomba';

    protected $fillable = ['nama_event','tanggal_event','lokasi_event','deskripsi','id_users_pembuat'];

    public function pembuat(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pembuat', 'id_users'); }
    public function kategori(): HasMany { return $this->hasMany(KategoriLomba::class, 'id_event_lomba', 'id_event_lomba'); }
    public function peserta(): HasMany { return $this->hasMany(PesertaLomba::class, 'id_event_lomba', 'id_event_lomba'); }
}
