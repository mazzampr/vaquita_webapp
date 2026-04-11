<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notifikasi extends ModelIndonesia
{
    use HasFactory;

    protected $table = 'notifikasi';
    protected $primaryKey = 'id_notifikasi';
    public $timestamps = false;

    protected $fillable = ['id_users','judul','pesan','tipe_notifikasi','sudah_dibaca','dibaca_pada','created_at'];

    protected function casts(): array
    {
        return [
            'sudah_dibaca' => 'boolean',
        ];
    }

    public function user(): BelongsTo { return $this->belongsTo(User::class, 'id_users', 'id_users'); }
}
