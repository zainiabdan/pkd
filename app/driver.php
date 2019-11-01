<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    //
    protected $table ='drivers';
    public $incrementing = false;
    protected $primaryKey = 'id_driver';
    
    protected $fillable = [ 
        'id_driver',
        'id_user'
    ];
}
