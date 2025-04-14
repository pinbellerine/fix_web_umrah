<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JamaahHaji;
use App\Models\JamaahUmrah;
use App\Models\WisataDomestik;
use App\Models\WisataLuarNegeri;
use App\Models\AdminLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('login');
    }
    
    /**
     * Handle login across all user tables
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('username', 'password');
        $username = $credentials['username'];
        $password = $credentials['password'];
        
        // First check all regular user tables (check these first to prioritize them)
        
        // Check jamaah haji
        $hajiUser = JamaahHaji::where('username', $username)->first();
        if ($hajiUser && Hash::check($password, $hajiUser->password)) {
            Session::put('user_id', $hajiUser->id);
            Session::put('user_type', 'haji');
            Session::put('user_role', 'user');
            Session::put('username', $hajiUser->username);
            
            // Create a custom user for Auth system (important: set correct role)
            $user = new User([
                'id' => $hajiUser->id,
                'username' => $hajiUser->username,
                'role' => 'user',
                'user_type' => 'haji',
                'user_id' => $hajiUser->id
            ]);
            Auth::login($user);
            
            Log::info("Jamaah Haji login successful: {$hajiUser->username}");
            return redirect('/viewuserprofil');
        }
        
        // Check jamaah umrah
        $umrahUser = JamaahUmrah::where('username', $username)->first();
        if ($umrahUser && Hash::check($password, $umrahUser->password)) {
            Session::put('user_id', $umrahUser->id);
            Session::put('user_type', 'umrah');
            Session::put('user_role', 'user');
            Session::put('username', $umrahUser->username);
            
            // Create a custom user for Auth system
            $user = new User([
                'id' => $umrahUser->id,
                'username' => $umrahUser->username,
                'role' => 'user',
                'user_type' => 'umrah',
                'user_id' => $umrahUser->id
            ]);
            Auth::login($user);
            
            Log::info("Jamaah Umrah login successful: {$umrahUser->username}");
            return redirect('/viewuserprofil');
        }
        
        // Check wisata domestik
        $domestikUser = WisataDomestik::where('username', $username)->first();
        if ($domestikUser && Hash::check($password, $domestikUser->password)) {
            Session::put('user_id', $domestikUser->id);
            Session::put('user_type', 'wisata_domestik');
            Session::put('user_role', 'user');
            Session::put('username', $domestikUser->username);
            
            // Create a custom user for Auth system
            $user = new User([
                'id' => $domestikUser->id,
                'username' => $domestikUser->username,
                'role' => 'user',
                'user_type' => 'wisata_domestik',
                'user_id' => $domestikUser->id
            ]);
            Auth::login($user);
            
            Log::info("Wisata Domestik login successful: {$domestikUser->username}");
            return redirect('/viewuserprofil');
        }
        
        // Check wisata luar negeri
        $luarNegeriUser = WisataLuarNegeri::where('username', $username)->first();
        if ($luarNegeriUser && Hash::check($password, $luarNegeriUser->password)) {
            Session::put('user_id', $luarNegeriUser->id);
            Session::put('user_type', 'wisata_luar_negeri');
            Session::put('user_role', 'user');
            Session::put('username', $luarNegeriUser->username);
            
            // Create a custom user for Auth system
            $user = new User([
                'id' => $luarNegeriUser->id,
                'username' => $luarNegeriUser->username,
                'role' => 'user',
                'user_type' => 'wisata_luar_negeri',
                'user_id' => $luarNegeriUser->id
            ]);
            Auth::login($user);
            
            Log::info("Wisata Luar Negeri login successful: {$luarNegeriUser->username}");
            return redirect('/viewuserprofil');
        }
        
        // LASTLY check admin (only if no regular user was found)
        $admin = AdminLogin::where('username', $username)
                    ->where('role', 'admin')
                    ->first();
                    
        if ($admin && Hash::check($password, $admin->password)) {
            // Create a user instance for authentication with ALL fields explicitly set
            $user = new User();
            $user->id = $admin->id;
            $user->username = $admin->username;
            $user->role = 'admin'; // Explicitly set role
            $user->user_type = 'admin';
            $user->user_id = null;
            
            // Force the attributes to be set
            $user->setRawAttributes([
                'id' => $admin->id,
                'username' => $admin->username,
                'role' => 'admin',
                'user_type' => 'admin',
            ]);
            
            Auth::login($user);
            
            // Store session data
            Session::put('user_id', $admin->id);
            Session::put('user_type', 'admin');
            Session::put('user_role', 'admin');
            Session::put('username', $admin->username);
            Session::save(); // Ensure session is saved
            
            Log::info("Admin login successful", [
                'username' => $admin->username,
                'role' => 'admin',
                'auth_check' => Auth::check(),
                'auth_id' => Auth::id(),
                'auth_user_role' => Auth::user()->role,
                'session_user_role' => Session::get('user_role')
            ]);
            
            return redirect('/dashboard');
        }
        
        Log::warning("Failed login attempt for username: {$username}");
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }
    
    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    /**
     * Display current auth and session information (for debugging)
     */
    public function debug()
    {
        if (Auth::check()) {
            $data = [
                'auth_check' => Auth::check(),
                'auth_id' => Auth::id(),
                'auth_user' => Auth::check() ? [
                    'id' => Auth::user()->id,
                    'username' => Auth::user()->username,
                    'role' => Auth::user()->role,
                    'user_type' => Auth::user()->user_type,
                    'attributes' => Auth::user()->getAttributes(),
                ] : null,
                'session_user_id' => Session::get('user_id'),
                'session_user_type' => Session::get('user_type'),
                'session_user_role' => Session::get('user_role'),
                'session_username' => Session::get('username'),
            ];
            
            return response()->json($data);
        }
        
        return response()->json(['error' => 'Not authenticated']);
    }
}
