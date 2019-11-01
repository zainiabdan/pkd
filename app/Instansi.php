<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    //
    protected $table ='instansi';
    public $incrementing = false;
    protected $primaryKey = 'id_instansi';
    
    protected $fillable = [ 
        'id_instansi',
        'nama_instansi', 
        'alamat'
    ];
}
