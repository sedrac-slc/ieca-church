<?php

namespace App\Services;

use App\Data\UserData;
use App\Enum\Seeder\UserEnum;
use App\Exceptions\NotFoundException;
use App\Http\Requests\Post\UserPostRequest;
use App\Http\Requests\Put\UserPutRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserService{

    public function findById(string $id){
        $user = User::find($id);
        if(!isset($user->id)) throw new NotFoundException();
        return $user;
    }

    public function save(UserPostRequest $request){
        $data = $request->all();
        $data[User::PASSWORD] = bcrypt($data[User::PASSWORD]);
        User::create(store($data));
    }

    public function update(UserPutRequest $request){
        $data = $request->all();
        $user = $this->findById($request->id);

        $user->update(modify([
            User::EMAIL => $data[User::EMAIL],
            User::IDENTITY_CARD => $data[User::IDENTITY_CARD],
            User::FULLNAME => $data[User::FULLNAME],
            User::FULLNAME_FATHER => $data[User::FULLNAME_FATHER],
            User::FULLNAME_MOTHER => $data[User::FULLNAME_MOTHER],
            User::MARITAL_STATUS => $data[User::MARITAL_STATUS],
            User::GENDER => $data[User::GENDER],
            User::BIRTHDAY => $data[User::BIRTHDAY],
        ]));
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
