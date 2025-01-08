<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;



// Superclass User
class User extends Authenticatable
{
    protected $table = 'msuser';

    protected $primaryKey = 'usr_id';
    protected $fillable = [
        'usr_name', 'usr_password', 'rol_id', 'usr_status'
    ];

    protected $hidden = [
        'usr_password',
    ];

    // method verifikasi username dan password
    public static function verifyCredentials($usr_id, $password)
    {
        $user = self::where('usr_name', $usr_id)->first();
        if($user && hash::check($password, $user->password)) {
            return $user;
        }
        return null;
    }

    // ambil data role user
    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id', 'rol_id');
    }
}