<?php

namespace App\Services;

use App\Enum\Concrect\CommonFields;
use App\Exceptions\NotFoundException;
use App\Http\Requests\Post\RolePostRequest;
use App\Http\Requests\Put\RolePutRequest;
use App\Interface\ISearchName;
use App\Interface\IService;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class RoleService implements IService, ISearchName{

    public function findById($id){
        $role = Role::find($id);
        if(!isset($role->id)) throw new NotFoundException();
        return $role;
    }

    public function findByName(string $name){
        return Role::where(Role::NAME,$name)->first();
    }

    public function saveOrUpdateSeeder(Role $role, User $user){
        $data = $role->getAttributes();
        $data[CommonFields::CREATED_BY] = $data[CommonFields::UPDATED_BY] = $user->id;
        $data[CommonFields::CREATED_AT] = $data[CommonFields::UPDATED_AT] = Carbon::now();
        Role::updateOrCreate([Role::NAME => $role->name], $data);
    }

    public function save(RolePostRequest $request){
        $data = $request->all();
        Role::create(store($data));
    }

    public function update(RolePutRequest $request){
        $data = $request->all();
        $role = $this->findById($request->id);

        $role->update(modify([
            Role::NAME => $data[Role::NAME],
            Role::DESCRIPTION => $data[Role::DESCRIPTION]
        ]));
    }

    public function delete(string $id){
        $role = $this->findById($id);
        $role->delete();
    }

}
