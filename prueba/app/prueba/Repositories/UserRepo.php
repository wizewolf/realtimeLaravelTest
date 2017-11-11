<?php

namespace App\prueba\Repositories;
use App\prueba\Entities\User;

class UserRepo{
    public function getUserNotAdmin(){
        return User::all();

    }

    public function getUserbyId($userId){
        return User::find($userId);
    }

}