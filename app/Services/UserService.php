<?php

namespace App\Services;

use App\Data\UserData;
use App\Enum\Seeder\UserEnum;
use App\Exceptions\NotFoundException;
use App\Http\Requests\Post\UserPostRequest;
use App\Http\Requests\Put\UserPutRequest;
use App\Models\User;

class UserService{

    public function findById(string $id){
        $user = User::find($id);
        if(!isset($user->id)) throw new NotFoundException();
        return $user;
    }

    public function save(UserPostRequest $request){
        User::create($request->all());
    }

    public function update(UserPutRequest $request,string $id){
        $user = $this->findById($id);
        $user->update($request->all());
    }

    public function delete(string $id){
        $user = $this->findById($id);
        $user->delete();
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
