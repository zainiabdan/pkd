<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

      public $incrementing = false;
     protected $primaryKey = 'id_role';
     protected $table = 'roles';


    // public function users()
    // {
    //     return $this->belongsToMany('App\User');
    // }

     public function users()
    {
       return $this->belongsToMany('App\User' , 'roles', 'id_roles', 'id_role');
    }

    
}
