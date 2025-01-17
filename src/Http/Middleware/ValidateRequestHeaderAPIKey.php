<?php

namespace brianllevado123\BWZohoGuard\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateRequestHeaderAPIKey
{
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = config('bitwarden.api_key');
        $requestApiKey = $request->header('x-api-key');

        if (! hash_equals($requestApiKey, $apiKey)) {
            return response()->json(['message' => 'Unauthorized. The provided API Key is invalid.'], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
