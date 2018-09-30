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
      return $this->hasOne('App\Role', 'id', 'role_id');
    }


    public function hasRole($roles)
    {
        if (is_array($roles)) {

            foreach($roles as $need_role) {

                if($this->checkIfUserHasRole($need_role)) {

                    return true;
                }
            }

        } else {

            return $this->checkIfUserHasRole($roles);
        }

        return false;
    }


    private function checkIfUserHasRole($need_role)
    {
        return (strtolower($need_role) == strtolower($this->role->name)) ? true : null;
    }


    public static function manageStatus($roleid, $previous, $updated)
    {
        if(\Auth::user()->role_id == 2){

            if($roleid == 3){

                $status = $updated;

            }else{

                $status = $previous;
            }

        } else {

            $status = $updated;
        }

        return $status;
    }

}
