<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kra8\Snowflake\HasSnowflakePrimary;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, HasSnowflakePrimary;

    protected $table = 'users';
    protected $primaryKey = 'id_users';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'kata_sandi',
        'aktif',
        'email_terverifikasi_pada',
    ];

    protected $hidden = [
        'kata_sandi',
    ];

    protected function casts(): array
    {
        return [
            'email_terverifikasi_pada' => 'datetime',
            'kata_sandi' => 'hashed',
            'aktif' => 'boolean',
        ];
    }

    public function getAuthPassword(): string
    {
        return $this->kata_sandi;
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_role', 'id_users', 'id_roles')
            ->withTimestamps();
    }

    public function hasRole(string $namaRole): bool
    {
        return $this->roles()->where('nama_role', $namaRole)->exists();
    }

    public function profilSiswa(): HasMany
    {
        return $this->hasMany(ProfilSiswa::class, 'id_users', 'id_users');
    }

    public function profilPelatih(): HasMany
    {
        return $this->hasMany(ProfilPelatih::class, 'id_users', 'id_users');
    }

    public function notifikasi(): HasMany
    {
        return $this->hasMany(Notifikasi::class, 'id_users', 'id_users');
    }
}
