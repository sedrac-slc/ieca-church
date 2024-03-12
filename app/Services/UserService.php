<?php

namespace App\Services;

use App\Data\UserData;
use App\Enum\Seeder\UserEnum;
use App\Models\User;

class UserService{

    public function saveOrUpdateSeeder(User $user){
        User::updateOrCreate([User::EMAIL => $user->email, User::NUMBER_BI => $user->number_bi], $user->getAttributes());
    }

    public function findbyFullname(string $fullname){
        return User::where([User::FULLNAME => $fullname ])->first();
    }

    public function findAdmin(): User{
        return User::where([User::EMAIL => UserData::getData(UserEnum::SUPER)->email ])->first();
    }

}
