<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthService
{
    public function login(string $email, string $password): array
    {
        $user = User::query()->where('email', $email)->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            throw new UnauthorizedHttpException('', 'Email atau password tidak valid.');
        }

        if (! $user->is_active) {
            throw new HttpException(403, 'Akun tidak aktif.');
        }

        $user->tokens()->delete();

        $token = $user->createToken('auth-token');

        return [
            'access_token' => $token->plainTextToken,
            'token_type' => 'Bearer',
            'expires_at' => null,
            'user' => $user,
        ];
    }
}
