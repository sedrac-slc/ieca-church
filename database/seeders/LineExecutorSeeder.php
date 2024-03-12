<?php

namespace Database\Seeders;

use App\Data\{
    PermissionData,
    RoleData,
    UserData,
};
use App\Enum\Seeder\Pivot\{
    PermissionRoleEnum,
    UserRoleEnum,
};
use App\Services\{
    PermissionRoleService,
    PermissionService,
    UserRoleService,
    UserService,
    RoleService,
};
use Illuminate\Database\Seeder;

class LineExecutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userService = new UserService();
        $roleService = new RoleService();
        $permissionService = new PermissionService();

        $userRoleService = new UserRoleService($userService, $roleService);
        $permissionRoleService = new PermissionRoleService($permissionService, $roleService);

        foreach (UserData::all() as $user)
            $userService->saveOrUpdateSeeder($user);

        $user = $userService->findAdmin();

        foreach (RoleData::all() as $role)
            $roleService->saveOrUpdateSeeder($role,  $user);

        foreach (PermissionData::all() as $permission)
            $permissionService->saveOrUpdateSeeder($permission,  $user);

        foreach (PermissionRoleEnum::all() as $permissionRole)
            $permissionRoleService->saveOrUpdateSeeder($permissionRole,  $user);

        foreach(UserRoleEnum::all() as $userRole)
            $userRoleService->saveOrUpdateSeeder($userRole,  $user);

    }
}
