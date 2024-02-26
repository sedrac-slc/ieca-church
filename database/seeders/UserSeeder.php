<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Data\UserData;
use App\Services\UserService;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service = new UserService();
        foreach(UserData::all() as $user)
            $service->saveOrUpdateSeeder($user);
    }
}
