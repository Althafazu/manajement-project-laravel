<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    use HasFactory;
    protected $table = 'msrole';
    
    protected $primaryKey = 'rol_id';

    protected $fillable = [
        'rol_deskripsi', 
        'rol_status'
    ];
}
