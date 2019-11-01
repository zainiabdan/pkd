<?php

namespace App;

use HttpOz\Roles\Traits\HasRole;
use HttpOz\Roles\Contracts\HasRole as HasRoleContract;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRole;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $incrementing = false;
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'id_user',
         'name', 
         'email', 
         'password',
         'alamat', 
         'id_instansi', 
         'no_telp', 
         'foto_ktp',
         'foto_profil',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function roles()
    {
       return $this->belongsToMany('App\Role' , 'role_user', 'id_user', 'id_role');
    }

    
    // public function roleUser()
    // {
    //     return $this->belongsToMany('App\RoleUser');
    // }



    public function hasRole($role)
    {
        // $roles = User::join('role_user', 'users.id_user', '=', 'role_user.user_id')
        //                 ->join('roles', 'users.id_user', '=', 'role_user.user_id')
        //                 ->select('users.*')
        //                 ->where('roles.name', $role)
        //                 ->count();

         $roles = $this->roles()->where('roles.name', $role)->count();
        
        if($roles==1)
            return true;
        return false;
    }
}
