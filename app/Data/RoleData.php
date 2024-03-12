<?php

namespace App\Data;

use App\Enum\Seeder\RoleEnum;
use App\Models\Role;
use Exception;

class RoleData{

    public static function getData($code){
        switch($code){
            case RoleEnum::ROLE_SUPER:
                return new Role([Role::NAME => $code, Role::DESCRIPTION => "Permissão total", Role::TYPE_SYSTEM => true]);
            case RoleEnum::ROLE_USER:
                return new Role([Role::NAME => $code, Role::DESCRIPTION => "Gerenciar utilizadores", Role::TYPE_SYSTEM => true]);
            case RoleEnum::ROLE_ROLE:
                return new Role([Role::NAME => $code, Role::DESCRIPTION => "Gerenciar cargos", Role::TYPE_SYSTEM => true]);
            default:
                throw new Exception("code: {$code} not found");
        }
    }

    public static function all(){
        return [
            static::getData(RoleEnum::ROLE_SUPER),
            static::getData(RoleEnum::ROLE_USER),
            static::getData(RoleEnum::ROLE_ROLE),
        ];
    }

}
