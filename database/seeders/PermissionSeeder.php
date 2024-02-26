<?php

namespace Database\Seeders;

use App\Data\PermissionData;
use App\Services\PermissionService;
use App\Services\UserService;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = (new UserService())->findAdmin();
        $permissionService = new PermissionService();
        foreach(PermissionData::all() as $permission)
            $permissionService->saveOrUpdateSeeder($permission,  $user);
    }
}
