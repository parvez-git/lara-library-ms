<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function hasRole($role)
    {
        if ($this->role()->where('name',$role)->first()) {
          return true;
        }
        return false;
    }

}
