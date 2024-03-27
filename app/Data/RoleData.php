<?php

namespace App\Data;

use App\Enum\Seeder\RoleEnum;
use App\Models\Role;
use Exception;

class RoleData{

    public static function getData($code){
        switch($code){
            case RoleEnum::ROLE_SUPER:
                return new Role([Role::NAME => $code, Role::DESCRIPTION => "Administrador de todo sistema", Role::TYPE_SYSTEM => true]);
            case RoleEnum::ROLE_USER:
                return new Role([Role::NAME => $code, Role::DESCRIPTION => "Administrador de utilizadores", Role::TYPE_SYSTEM => true]);
            case RoleEnum::ROLE_ROLE:
                return new Role([Role::NAME => $code, Role::DESCRIPTION => "Administrador de cargos", Role::TYPE_SYSTEM => true]);
            case RoleEnum::ROLE_PERMISSION:
                return new Role([Role::NAME => $code, Role::DESCRIPTION => "Administrador de permissões", Role::TYPE_SYSTEM => true]);
            case RoleEnum::ROLE_BAPTISM:
                return new Role([Role::NAME => $code, Role::DESCRIPTION => "Administrador de baptismo", Role::TYPE_SYSTEM => true]);
            default:
                throw new Exception("code: {$code} not found");
        }
    }

    public static function all(){
        return [
            static::getData(RoleEnum::ROLE_SUPER),
            static::getData(RoleEnum::ROLE_USER),
            static::getData(RoleEnum::ROLE_ROLE),
            static::getData(RoleEnum::ROLE_PERMISSION),
            static::getData(RoleEnum::ROLE_BAPTISM),
        ];
    }

}
