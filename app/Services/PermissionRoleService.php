<?php

namespace App\Services;

use App\Enum\Concrect\CommonFields;
use App\Models\PermissionRole;
use App\Models\User;
use Carbon\Carbon;

class PermissionRoleService{

    private RoleService $roleService;
    private PermissionService $permissionService;

    function __construct($permissionService = null, $roleService = null){
        $this->roleService = isset($roleService) ? $roleService : new RoleService();
        $this->permissionService = isset($permissionService) ? $permissionService : new PermissionService();
    }

    public function saveOrUpdateSeeder(string $permissionRoleEnum, User $user){
        $split = explode(SEPARATOR_PIVOT, $permissionRoleEnum);
        $role = $this->roleService->findByName($split[1]);
        $permission = $this->permissionService->findByName($split[0]);
        $keys = $data = [ PermissionRole::ROLE_ID => $role->id, PermissionRole::PERMISSION_ID => $permission->id];
        $data[CommonFields::CREATED_BY] = $data[CommonFields::UPDATED_BY] = $user->id;
        $data[CommonFields::CREATED_AT] = $data[CommonFields::UPDATED_AT] = Carbon::now();
        PermissionRole::updateOrCreate($keys, $data);
    }

}
