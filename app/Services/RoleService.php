<?php

namespace App\Services;

use App\Enum\Concrect\CommonFields;
use App\Interface\ISearchName;
use App\Interface\IService;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class RoleService implements IService, ISearchName{

    public function findById($id){
        return Role::find($id);
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

}
