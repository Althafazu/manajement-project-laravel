<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;



// Superclass User
class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'username', 'password', 'roleId', 'idKelompok', 'statusUser'
    ];

    protected $hidden = [
        'password',
    ];

    // method verifikasi username dan password
    public static function verifyCredentials($username, $password)
    {
        $user = self::where('username', $username)->first();
        if($user && hash::check($password, $user->password)) {
            return $user;
        }
        return null;
    }

    // ambil data role user
    public function role()
    {
        return $this->belongsTo(Role::class, 'roleId', 'roleId');
    }
}