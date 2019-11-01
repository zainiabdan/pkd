<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    public $incrementing = false;
    protected $primaryKey = 'id_type';
    protected $fillable = [ 'id_type' ,'name'];

}
