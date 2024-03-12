<?php

namespace App\Services;

use App\Enum\Concrect\CommonFields;
use App\Interface\ISearchName;
use App\Interface\IService;
use App\Models\Permission;
use App\Models\User;
use Carbon\Carbon;

class PermissionService implements IService, ISearchName{

    public function findById($id){
        return Permission::find($id);
    }

    public function findByName(string $name){
        return Permission::where(Permission::NAME,$name)->first();
    }

    public function saveOrUpdateSeeder(Permission $permission, User $user){
        $data = $permission->getAttributes();
        $data[CommonFields::CREATED_BY] = $data[CommonFields::UPDATED_BY] = $user->id;
        $data[CommonFields::CREATED_AT] = $data[CommonFields::UPDATED_AT] = Carbon::now();
        Permission::updateOrCreate([Permission::NAME => $permission->name], $data);
    }

}
