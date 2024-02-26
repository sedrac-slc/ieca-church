<?php

namespace App\Services;

use App\Models\User;

class UserService{

    public function saveOrUpdate(User $user){
        User::updateOrCreate([User::EMAIL => $user->email, User::NUMBER_BI => $user->number_bi], $user->getAttributes());
    }

}
