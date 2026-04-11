<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogAudit extends ModelIndonesia
{
    use HasFactory;

    protected $table = 'log_audit';
    protected $primaryKey = 'id_log_audit';
    public $timestamps = false;

    protected $fillable = ['id_users','aksi','entitas_tipe','entitas_id','nilai_lama','nilai_baru','alamat_ip','agen_pengguna','created_at'];

    protected function casts(): array
    {
        return [
            'nilai_lama' => 'array',
            'nilai_baru' => 'array',
        ];
    }

    public function user(): BelongsTo { return $this->belongsTo(User::class, 'id_users', 'id_users'); }
}
