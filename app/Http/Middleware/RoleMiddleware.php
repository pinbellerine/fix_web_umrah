<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // First check if the user is authenticated
        if (!Auth::check()) {
            Log::info("User not authenticated, redirecting to login");
            return redirect()->route('login');
        }

        // Get role both from Auth user and Session
        $authUser = Auth::user();
        $authUsername = $authUser->username ?? 'unknown';
        $authRole = $authUser->role ?? null;
        $sessionRole = Session::get('user_role');
        
        // Log everything for debugging
        Log::info("RoleMiddleware check", [
            'required_role' => $role,
            'auth_username' => $authUsername,
            'auth_role' => $authRole,
            'session_role' => $sessionRole,
            'auth_user_attributes' => $authUser->getAttributes() ?? [],
            'session_all' => Session::all()
        ]);
        
        // Check role - SIMPLIFIED check using either auth or session
        if ($authRole === $role || $sessionRole === $role) {
            Log::info("Role match found, allowing access to {$request->path()}");
            return $next($request);
        }
        
        Log::warning("Access denied for user $authUsername with role $authRole/$sessionRole to route requiring $role");
        
        // Redirect based on current user role
        if ($authRole === 'user' || $sessionRole === 'user') {
            return redirect('/viewuserprofil')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }
        
        return redirect('/login')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
    }
}
