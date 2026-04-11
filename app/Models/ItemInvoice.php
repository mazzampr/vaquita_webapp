<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemInvoice extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'item_invoice';
    protected $primaryKey = 'id_item_invoice';

    protected $fillable = ['id_invoice','tipe_item','deskripsi','jumlah','harga_satuan','total_baris'];

    public function invoice(): BelongsTo { return $this->belongsTo(Invoice::class, 'id_invoice', 'id_invoice'); }
}
