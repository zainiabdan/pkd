<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    //
    public $incrementing = false;
    protected  $primaryKey = 'id_detail_transaction';

     protected $fillable = [
        'id_detail_transaction',
        'id_transaction',
        'id_vehicle',
        'id_driver',
     ];
}
