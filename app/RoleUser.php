<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    //
      public $incrementing = false;
    protected $primaryKey = 'id_role_user';
    protected $fillable = [ 'id_role_user', 'id_role', 'id_user'];
    protected $table ='role_user';

        public function users()
     {
         return $this->belongsToMany('App\User');
     }

}
