<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanPendaftaran extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'pengajuan_pendaftaran';
    protected $primaryKey = 'id_pengajuan_pendaftaran';

    protected $fillable = ['id_users_siswa','id_paket_langganan_diminta','id_lokasi_kolam_diminati','hari_diminati','jam_diminati','status_pengajuan','alasan_penolakan','id_users_peninjau','ditinjau_pada'];

    protected function casts(): array
    {
        return [
            'hari_diminati' => 'array',
        ];
    }

    public function siswa(): BelongsTo { return $this->belongsTo(User::class, 'id_users_siswa', 'id_users'); }
    public function paketDiminta(): BelongsTo { return $this->belongsTo(PaketLangganan::class, 'id_paket_langganan_diminta', 'id_paket_langganan'); }
    public function lokasiDiminati(): BelongsTo { return $this->belongsTo(LokasiKolam::class, 'id_lokasi_kolam_diminati', 'id_lokasi_kolam'); }
    public function peninjau(): BelongsTo { return $this->belongsTo(User::class, 'id_users_peninjau', 'id_users'); }
}
