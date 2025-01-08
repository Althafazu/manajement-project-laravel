<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    //

    protected $table = 'kelompok';

    protected $primaryKey = 'id';

    protected $fillable = [ 
        'nama_kelompok', 'status'
    ];
    
}
