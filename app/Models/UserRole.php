<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRole extends ModelIndonesia
{
    use HasFactory;

    protected $table = 'user_role';
    protected $primaryKey = 'id_user_role';

    protected $fillable = [
        'id_users',
        'id_roles',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_users', 'id_users');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id_roles', 'id_roles');
    }
}
