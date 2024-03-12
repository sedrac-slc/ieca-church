<?php

namespace App\Enum\Seeder\Pivot;

use App\Enum\Seeder\UserEnum;
use App\Enum\Seeder\RoleEnum;

final class UserRoleEnum{

    public const USER_SUPER_AND_ROLE_USER = UserEnum::SUPER .SEPARATOR_PIVOT. RoleEnum::ROLE_SUPER;
    public const USER_USER_AND_ROLE_USER = UserEnum::USER .SEPARATOR_PIVOT. RoleEnum::ROLE_USER;
    public const USER_ROLE_AND_ROLE_ROLE = UserEnum::ROLE .SEPARATOR_PIVOT. RoleEnum::ROLE_ROLE;
    public const USER_PERMISSION_AND_ROLE_PERMISSION = UserEnum::PERMISSION .SEPARATOR_PIVOT. RoleEnum::ROLE_PERMISSION;


    public static function all(){
        return [
            static::USER_SUPER_AND_ROLE_USER, static::USER_USER_AND_ROLE_USER, static::USER_ROLE_AND_ROLE_ROLE, static::USER_PERMISSION_AND_ROLE_PERMISSION
        ];
    }

}
