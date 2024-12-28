<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class AuthenticateTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check for the token in the request cookies
        $token = $request->cookie('auth_token');  // 'auth_token' should match what you set during authentication

        if (!$token) {
            return response()->json(['error' => 'Token not provided'], 401);
        }

        // Find the personal access token from the database
        $tokenData = PersonalAccessToken::findToken($token);

        // Check if the token is valid and associated with a user (teacher)
        if (!$tokenData || !$tokenData->tokenable || !$tokenData->tokenCan('Teacher')) {
            return response()->json(['error' => 'Unauthorized or invalid token'], 401);
        }

        // Proceed to the next request
        return $next($request);
    }
}
