<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AuthDebugMiddleware
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
        // Only log during login/authentication routes to reduce log clutter
        $authRoutes = ['login', 'profile', 'dashboard', 'viewuserprofil'];
        
        if ($request->route() && 
            (in_array($request->route()->getName(), $authRoutes) || 
            in_array($request->path(), $authRoutes))) {
            
            $this->logAuthStatus("Auth status for route: {$request->path()}");
        }
        
        return $next($request);
    }

    /**
     * Log current authentication status
     */
    private function logAuthStatus($message = "Auth Status Check")
    {
        $isLoggedIn = Auth::check() ? 'Yes' : 'No';
        $authUser = Auth::check() ? Auth::user()->username : 'None';
        $authRole = Auth::check() ? Auth::user()->role : 'None';
        $authType = Auth::check() ? (Auth::user()->user_type ?? 'None') : 'None';
        
        $sessionUserId = Session::get('user_id') ?? 'None';
        $sessionUsername = Session::get('username') ?? 'None';
        $sessionUserRole = Session::get('user_role') ?? 'None';
        $sessionUserType = Session::get('user_type') ?? 'None';
        
        Log::info("$message - AUTH: Logged in: $isLoggedIn, User: $authUser, Role: $authRole, Type: $authType");
        Log::info("$message - SESSION: ID: $sessionUserId, User: $sessionUsername, Role: $sessionUserRole, Type: $sessionUserType");
    }
}
