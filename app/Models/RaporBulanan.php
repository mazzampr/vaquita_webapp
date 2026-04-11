<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RaporBulanan extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'rapor_bulanan';
    protected $primaryKey = 'id_rapor_bulanan';

    protected $fillable = ['id_users_siswa','id_users_pelatih','bulan_rapor','level_awal','level_akhir','ringkasan','terkunci','dikirim_pada'];

    public function siswa(): BelongsTo { return $this->belongsTo(User::class, 'id_users_siswa', 'id_users'); }
    public function pelatih(): BelongsTo { return $this->belongsTo(User::class, 'id_users_pelatih', 'id_users'); }
}
