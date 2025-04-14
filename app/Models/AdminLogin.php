<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLogin extends Model
{
    use HasFactory;

    protected $table = 'admin_login';

    protected $fillable = [
        'username',
        'password',
        'role',
        'user_type',
        'user_id'
    ];

    /**
     * Get the related user record based on user_type
     */
    public function getRelatedUser()
    {
        if (!$this->user_type || !$this->user_id) {
            return null;
        }

        switch ($this->user_type) {
            case 'haji':
                return JamaahHaji::find($this->user_id);
            case 'umrah':
                return JamaahUmrah::find($this->user_id);
            case 'wisata_domestik':
                return WisataDomestik::find($this->user_id);
            case 'wisata_luar_negeri':
                return WisataLuarNegeri::find($this->user_id);
            default:
                return null;
        }
    }

    public function jamaahHaji()
    {
        return $this->hasOne(JamaahHaji::class);
    }

    public function jamaahUmrah()
    {
        return $this->hasOne(JamaahUmrah::class);
    }

    public function wisataDomestik()
    {
        return $this->hasOne(WisataDomestik::class);
    }

    public function wisataLuarNegeri()
    {
        return $this->hasOne(WisataLuarNegeri::class);
    }
}
