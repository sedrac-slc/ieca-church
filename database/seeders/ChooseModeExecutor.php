<?php

namespace Database\Seeders;


class ChooseModeExecutor
{
    public const LINEAR = "LINEAR";
    public const MODULE = "MODULE";

    public static function seeders(string $mode): array{
        switch($mode){
            case static::MODULE:
                return [
                    UserSeeder::class,
                    PermissionSeeder::class,
                    RoleSeeder::class,
                    PermissionRoleSeeder::class,
                    UserRoleSeeder::class
                ];
            default:
                return [ LineExecutorSeeder::class];
        }
    }
}
