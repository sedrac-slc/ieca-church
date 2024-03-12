<?php

namespace App\Services;

use App\Enum\Concrect\CommonFields;
use App\Models\UserRole;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class UserRoleService{

    private RoleService $roleService;
    private UserService $userService;

    function __construct($userService = null, $roleService = null){
        $this->roleService = isset($roleService) ? $roleService : new RoleService();
        $this->userService = isset($userService) ? $userService : new UserService();
    }

    public function saveOrUpdateSeeder(string $userRoleEnum, User $user){
        $split = explode(SEPARATOR_PIVOT, $userRoleEnum);
        $role = $this->roleService->findByName($split[1]);
        $person = $this->userService->findbyFullname($split[0]);
        $keys = $data = [ UserRole::ROLE_ID => $role->id, UserRole::USER_ID => $person->id];
        $data[CommonFields::CREATED_BY] = $data[CommonFields::UPDATED_BY] = $user->id;
        $data[CommonFields::CREATED_AT] = $data[CommonFields::UPDATED_AT] = Carbon::now();
        UserRole::updateOrCreate($keys, $data);
    }

    public function rolesOfAuth(array $roles): bool{
        return UserRole::join(Role::TABLE, UserRole::ROLE_ID, Role::commonFields()->id)
        ->where(UserRole::USER_ID, auth()->user()->id)
        ->whereIn(Role::NAME, $roles)
        ->exists();
    }

}
