<?php

namespace App\Services;

use App\Data\UserData;
use App\Enum\Seeder\UserEnum;
use App\Http\Requests\Post\UserPostRequest;
use App\Models\User;

class UserService{

    public function save(UserPostRequest $request){
        dd(User::create($request->all()));
    }


    public function saveOrUpdateSeeder(User $user){
        User::updateOrCreate([User::EMAIL => $user->email, User::IDENTITY_CARD => $user->identity_card], $user->getAttributes());
    }

    public function findbyFullname(string $fullname){
        return User::where([User::FULLNAME => $fullname ])->first();
    }

    public function findAdmin(): User{
        return User::where([User::EMAIL => UserData::getData(UserEnum::SUPER)->email ])->first();
    }

}
