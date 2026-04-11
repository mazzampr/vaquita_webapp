<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HasilLomba extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'hasil_lomba';
    protected $primaryKey = 'id_hasil_lomba';

    protected $fillable = ['id_peserta_lomba','catatan_waktu','peringkat','prestasi','catatan','id_users_penginput'];

    public function pesertaLomba(): BelongsTo { return $this->belongsTo(PesertaLomba::class, 'id_peserta_lomba', 'id_peserta_lomba'); }
    public function penginput(): BelongsTo { return $this->belongsTo(User::class, 'id_users_penginput', 'id_users'); }
}
