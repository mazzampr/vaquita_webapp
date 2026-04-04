<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class HealthController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Service available',
            'data' => [
                'status' => 'ok',
                'timestamp' => now()->toIso8601String(),
            ],
        ]);
    }
}
