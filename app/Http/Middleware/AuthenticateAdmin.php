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
      /*  // Check if admin is authenticated via Sanctum
       if (Auth::guard('admin')->check()) {
        $user = Auth::guard('admin')->user();
        // Ensure the admin has the required token ability
        if ($user->tokenCan('Admin')) {
            return $next($request);
        } else {
            return response()->json(['error' => 'Token does not have the required ability'], 401);
        }
    } else {
        return response()->json(['error' => 'Not authenticated'], 401);
    } */
    }
}
