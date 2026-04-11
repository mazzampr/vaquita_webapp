<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PesertaLomba extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'peserta_lomba';
    protected $primaryKey = 'id_peserta_lomba';

    protected $fillable = ['id_event_lomba','id_kategori_lomba','id_users_siswa','id_users_pendaftar'];

    public function eventLomba(): BelongsTo { return $this->belongsTo(EventLomba::class, 'id_event_lomba', 'id_event_lomba'); }
    public function kategoriLomba(): BelongsTo { return $this->belongsTo(KategoriLomba::class, 'id_kategori_lomba', 'id_kategori_lomba'); }
    public function siswa(): BelongsTo { return $this->belongsTo(User::class, 'id_users_siswa', 'id_users'); }
    public function pendaftar(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pendaftar', 'id_users'); }
    public function hasilLomba(): HasOne { return $this->hasOne(HasilLomba::class, 'id_peserta_lomba', 'id_peserta_lomba'); }
}
