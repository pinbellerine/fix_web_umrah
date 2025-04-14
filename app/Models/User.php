<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin_login'; // Default table for admins

    protected $fillable = [
        'username',
        'password',
        'role',
        'user_type',
        'user_id',
    ];

    protected $hidden = [
        'password',
    ];
    
    /**
     * Get the user's role.
     *
     * @return string
     */
    public function getRoleAttribute($value)
    {
        // If we have a role explicitly set by AuthController, use it
        if (!empty($this->attributes['role'])) {
            return $this->attributes['role'];
        }
        
        // If we have a session role, use it
        $sessionRole = Session::get('user_role');
        if (!empty($sessionRole)) {
            return $sessionRole;
        }
        
        // Last resort, use the value from database or default
        return $value ?? 'user';
    }

    /**
     * Get the user's type.
     *
     * @return string
     */
    public function getUserTypeAttribute($value)
    {
        return Session::get('user_type') ?? $value ?? 'user';
    }

    /**
     * Determine if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin' || Session::get('user_role') === 'admin';
    }

    /**
     * Attempt to find a user across all possible tables
     *
     * @param string $username
     * @param string $password
     * @return array|null Returns [user object, user type] or null if not found
     */
    public static function findUserAcrossTables($username, $password)
    {
        // Check admin login first
        $admin = self::where('username', $username)->first();
        if ($admin && Hash::check($password, $admin->password)) {
            return ['user' => $admin, 'type' => 'admin'];
        }

        // Check jamaah haji
        $hajiUser = JamaahHaji::where('username', $username)->first();
        if ($hajiUser && Hash::check($password, $hajiUser->password)) {
            return ['user' => $hajiUser, 'type' => 'haji'];
        }
        
        // Check jamaah umrah
        $umrahUser = JamaahUmrah::where('username', $username)->first();
        if ($umrahUser && Hash::check($password, $umrahUser->password)) {
            return ['user' => $umrahUser, 'type' => 'umrah'];
        }

        // Check wisata domestik
        $domestikUser = WisataDomestik::where('username', $username)->first();
        if ($domestikUser && Hash::check($password, $domestikUser->password)) {
            return ['user' => $domestikUser, 'type' => 'wisata_domestik'];
        }

        // Check wisata luar negeri
        $luarNegeriUser = WisataLuarNegeri::where('username', $username)->first();
        if ($luarNegeriUser && Hash::check($password, $luarNegeriUser->password)) {
            return ['user' => $luarNegeriUser, 'type' => 'wisata_luar_negeri'];
        }

        return null;
    }
    
    /**
     * Get the related profile data based on user type
     */
    public function getProfileData()
    {
        $userType = Session::get('user_type');
        $userId = Session::get('user_id');
        
        switch ($userType) {
            case 'admin':
                return $this;
            case 'haji':
                return JamaahHaji::find($userId);
            case 'umrah':
                return JamaahUmrah::find($userId);
            case 'wisata_domestik':
                return WisataDomestik::find($userId);
            case 'wisata_luar_negeri':
                return WisataLuarNegeri::find($userId);
            default:
                return null;
        }
    }
}
