<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin_login'; // Default table for admins

    protected $fillable = [
        'username',
        'password',
        'role',
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
        // If we have a role in the session, use that
        return Session::get('user_role') ?? $value ?? 'user';
    }
}
