<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 
        'email', 
        'phone', 
        'birthdate',
        'gender',
        'address',  
        'photo',   
        'password',
        'role'
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

    public function articles() {
        return $this->hasMany('App\Article');
    }

    // Esta parte permite obtener los datos de users para realizar la busqueda con scope,
    // se debe poner el nombre despues de scope

    public function scopeNames($users, $q)
    {
        if(trim($q)){
            $users->where('fullname', 'LIKE', "%$q%");
        }
    }

}
