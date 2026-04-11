<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $roleNames = $this->whenLoaded('roles', fn () => $this->roles->pluck('nama_role')->values());

        return [
            'id' => $this->id_users,
            'nama_lengkap' => $this->nama_lengkap,
            'email' => $this->email,
            'role' => $this->whenLoaded('roles', fn () => $this->roles->pluck('nama_role')->first()),
            'roles' => $roleNames,
            'aktif' => $this->aktif,
        ];
    }
}
