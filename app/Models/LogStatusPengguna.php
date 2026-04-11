<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogStatusPengguna extends ModelIndonesia
{
    use HasFactory;

    protected $table = 'log_status_pengguna';
    protected $primaryKey = 'id_log_status_pengguna';
    public $timestamps = false;

    protected $fillable = [
        'id_users',
        'status_sebelum',
        'status_sesudah',
        'alasan',
        'id_users_pengubah',
        'created_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_users', 'id_users');
    }

    public function pengubah(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_users_pengubah', 'id_users');
    }
}
