<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated via Sanctum and has the 'Parent' ability
        if (Auth::guard('admin')->check() && Auth::user()->tokenCan('admin')) {
            return $next($request);
        }

        // If the user is not authenticated or lacks the 'Parent' ability, return an unauthorized error
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
