<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bombot extends Model
{
    //
    protected $table = 'msbombot';

    protected $primaryKey = 'bbt_id';
    protected $fillable = [
        'prj_id',
        'bbt_nama', 
        'bbt_no_pp', 
        'bbt_jumlah', 
        'bbt_satuan', 
        'bbt_jumlah_aktual', 
        'bbt_harga', 
        'bbt_status' 
    ];
}
