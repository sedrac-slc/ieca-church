<?php

namespace Database\Seeders;

use App\Data\RoleData;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = (new UserService())->findAdmin();
        $roleService = new RoleService();
        foreach(RoleData::all() as $role)
            $roleService->saveOrUpdateSeeder($role,  $user);
    }
}
