<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','country','occupation','mobile','weburl','verification_code','active_user',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function create(array $customerArr)
    {
        $customerArr = Input::get();

        DB::table('test')->insert(
            array(
                'name'     =>  $customerArr['name'],
                'email'   =>  $customerArr['email'],
                'password' => $customerArr['password'],
            )
        );
        $userID = DB::getPdo()->lastInsertId();

        if ($userID) {
            echo "Success";
        }
        else{
            echo "Fail";
        }

    }

}
