<?php

namespace Database\Seeders;

use App\Enum\Seeder\Pivot\UserRoleEnum;
use App\Services\UserRoleService;
use App\Services\UserService;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = (new UserService())->findAdmin();
        $userRoleService = new UserRoleService();
        foreach(UserRoleEnum::all() as $userRole)
            $userRoleService->saveOrUpdateSeeder($userRole,  $user);
    }
}
