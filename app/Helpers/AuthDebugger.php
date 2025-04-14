<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AuthDebugger
{
    /**
     * Log current authentication status
     */
    public static function logAuthStatus($message = "Auth Status Check")
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
