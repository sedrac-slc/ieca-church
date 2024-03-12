<?php

namespace Database\Seeders;

use App\Enum\Seeder\Pivot\PermissionRoleEnum;
use App\Services\PermissionRoleService;
use App\Services\UserService;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = (new UserService())->findAdmin();
        $permissionRoleService = new PermissionRoleService();
        foreach(PermissionRoleEnum::all() as $permissionRole)
            $permissionRoleService->saveOrUpdateSeeder($permissionRole,  $user);
    }
}
