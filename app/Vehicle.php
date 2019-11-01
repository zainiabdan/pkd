<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    public $incrementing = false;
    protected  $primaryKey = 'id_vehicle';
    protected $fillable = [ 
        'id_vehicle', 
        'file',
        'nopol',
        'name',
        'seats',
        'transmission',
        'ac',
        'available',
        'id_type'
    ];


    
    public function transactions()
    {
        return $this->belongsToMany('App\Transaction');
    }

    
}
