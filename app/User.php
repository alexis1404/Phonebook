<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function phones()
    {
        return $this->hasMany('App\Phone');
    }

    public function addNumber(Phone $phone)
    {
        $phones = $this->phones();

        if($phones->count() < 10){

            $this->phones()->save($phone);

            return true;

        }else{

            return false;
        }

    }

    public function editUser($name, $last_name, $pat)
    {
        if($name){
            $this->name = $name;
        }
        if($last_name){
            $this->last_name = $last_name;
        }
        if($pat){
            $this->pat = $pat;
        }

        $this->save();
    }

    /**
     * @throws \Exception
     */
    public function deleteUser()
    {
        $this->delete();
    }
}
