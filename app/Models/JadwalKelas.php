<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalKelas extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'jadwal_kelas';
    protected $primaryKey = 'id_jadwal_kelas';

    protected $fillable = ['id_kelas','hari_ke','jam_mulai','jam_selesai'];

    public function kelas(): BelongsTo { return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas'); }
}
