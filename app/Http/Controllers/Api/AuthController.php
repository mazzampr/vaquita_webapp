<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $authService) {}

    public function login(LoginRequest $request): JsonResponse
    {
        $validated = $request->validated();

        try {
            $loginData = $this->authService->login(
                $validated['email'],
                $validated['password'],
            );
        } catch (HttpException $exception) {
            if ($exception->getStatusCode() === 401) {
                Log::warning('Auth login failed: invalid credentials', [
                    'email' => $validated['email'],
                    'ip' => $request->ip(),
                ]);
            }

            if ($exception->getStatusCode() === 403) {
                Log::warning('Auth login failed: inactive user', [
                    'email' => $validated['email'],
                    'ip' => $request->ip(),
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], $exception->getStatusCode());
        } catch (Throwable $exception) {
            Log::error('Unexpected auth login error', [
                'email' => $validated['email'],
                'error' => $exception->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server, coba lagi.',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil.',
            'data' => [
                'access_token' => $loginData['access_token'],
                'token_type' => $loginData['token_type'],
                'expires_at' => $loginData['expires_at'],
                'user' => new UserResource($loginData['user']),
            ],
        ]);
    }

    public function me(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Profil pengguna berhasil diambil.',
            'data' => new UserResource($request->user()),
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()?->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil.',
            'data' => null,
        ]);
    }
}
