<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends ModelIndonesiaSoftDelete
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_roles';

    protected $fillable = [
        'nama_role',
        'deskripsi',
        'aktif',
    ];

    protected function casts(): array
    {
        return [
            'aktif' => 'boolean',
        ];
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_role', 'id_roles', 'id_users')
            ->withTimestamps();
    }
}
