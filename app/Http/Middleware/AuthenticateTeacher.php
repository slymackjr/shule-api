<?php
// app/Http/Middleware/AuthenticateTeacher.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateTeacher
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('teacher')->check() && Auth::user()->tokenCan('teacher')) {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
