<?php

namespace App\Enum\Seeder\Pivot;

use App\Enum\Seeder\PermissionEnum;
use App\Enum\Seeder\RoleEnum;

final class PermissionRoleEnum{

    public const VIEW_AND_USER = PermissionEnum::PERMISSION_VIEW.SEPARATOR_PIVOT.RoleEnum::ROLE_USER;
    public const CREATE_AND_USER = PermissionEnum::PERMISSION_CREATE.SEPARATOR_PIVOT.RoleEnum::ROLE_USER;
    public const UPDATE_AND_USER = PermissionEnum::PERMISSION_UPDATE.SEPARATOR_PIVOT.RoleEnum::ROLE_USER;
    public const DELETE_AND_USER = PermissionEnum::PERMISSION_DELETE.SEPARATOR_PIVOT.RoleEnum::ROLE_USER;

    public const VIEW_AND_ROLE = PermissionEnum::PERMISSION_ROLE_VIEW.SEPARATOR_PIVOT.RoleEnum::ROLE_ROLE;
    public const CREATE_AND_ROLE = PermissionEnum::PERMISSION_ROLE_CREATE.SEPARATOR_PIVOT.RoleEnum::ROLE_ROLE;
    public const UPDATE_AND_ROLE = PermissionEnum::PERMISSION_ROLE_UPDATE.SEPARATOR_PIVOT.RoleEnum::ROLE_ROLE;
    public const DELETE_AND_ROLE = PermissionEnum::PERMISSION_ROLE_DELETE.SEPARATOR_PIVOT.RoleEnum::ROLE_ROLE;

    public static function all(){
        return [
            static::VIEW_AND_USER, static::CREATE_AND_USER, static::UPDATE_AND_USER, static::DELETE_AND_USER,
            static::VIEW_AND_ROLE, static::CREATE_AND_ROLE, static::UPDATE_AND_ROLE, static::DELETE_AND_ROLE,
        ];
    }

}
