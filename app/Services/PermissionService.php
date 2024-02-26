<?php

namespace App\Services;

use App\Enum\CommonFields;
use App\Models\Permission;
use App\Models\User;
use Carbon\Carbon;

class PermissionService{

    public function saveOrUpdateSeeder(Permission $permission, User $user){
        $data = $permission->getAttributes();
        $data[CommonFields::CREATED_BY] = $data[CommonFields::UPDATED_BY] = $user->id;
        $data[CommonFields::CREATED_AT] = $data[CommonFields::UPDATED_AT] = Carbon::now();
        Permission::updateOrCreate([Permission::NAME => $permission->name], $data);
    }

}
