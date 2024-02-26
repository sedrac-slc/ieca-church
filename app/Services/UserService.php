<?php

namespace App\Services;

use App\Data\UserData;
use App\Enum\UserEnum;
use App\Models\User;

class UserService{

    public function saveOrUpdateSeeder(User $user){
        User::updateOrCreate([User::EMAIL => $user->email, User::NUMBER_BI => $user->number_bi], $user->getAttributes());
    }

    public function findAdmin(): User{
        return User::where([User::EMAIL => UserData::getData(UserEnum::ADMIN)->email ])->first();
    }

}
