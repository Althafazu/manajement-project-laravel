<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Bombot extends Model
{     
    use HasFactory;
    protected $table = 'msbombot';
    public $timestamps = false;

    protected $primaryKey = 'bbt_id';
    protected $fillable = [
        'prj_id',
        'bbt_nama_material', 
        'bbt_no_pp', 
        'bbt_jumlah', 
        'bbt_satuan', 
        'bbt_jumlah_aktual', 
        'bbt_harga', 
        'bbt_status' 
    ];
}
