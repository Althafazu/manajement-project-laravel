<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;



// Superclass User
class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'msuser';

    protected $primaryKey = 'usr_id';
    protected $fillable = [
        'usr_name', 'usr_password', 'rol_id',  'usr_status', 'kel_id'
    ];

    protected $hidden = [
        'usr_password',
    ];
    
    // method verifikasi username dan password
    public static function verifyCredentials($usr_id, $password)
    {
        $user = self::where('usr_name', $usr_id)->first();
        
        // Cek apakah user ada dan passwordnya sesuai
        if ($user && $user->usr_password === $password) return $user;
        return null;
    }

    // ambil data role
    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id', 'rol_id');
    }

    public function isRole($roleName)
    {
        return $this->role->rol_deskripsi === $roleName;
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kel_id', 'kel_id');
    }
}