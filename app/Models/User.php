<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'msuser';
    protected $primaryKey = 'usr_id';
    protected $fillable = [
        'usr_name', 'usr_password', 'rol_id', 'usr_status', 'kel_id'
    ];

    // Method untuk verifikasi username dan password
    public static function verifyCredentials($usr_id, $password)
    {
        // Mencari user berdasarkan usr_id dan password
        $user = self::where('usr_id', $usr_id)
                    ->where('usr_password', $password)
                    ->first();
        return $user;
    }

    // Relasi dengan model Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id', 'rol_id');
    }

    // Relasi dengan model Kelompok
    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kel_id', 'kel_id');
    }
}
