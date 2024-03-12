<?php

namespace App\Data;

use App\Enum\Seeder\PermissionEnum;
use App\Models\Permission;
use Exception;

class PermissionData{

    public static function getData($code){
        switch($code){

            case PermissionEnum::PERMISSION_VIEW:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Visualizar permissões"]);
            case PermissionEnum::PERMISSION_CREATE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Criar permissões"]);
            case PermissionEnum::PERMISSION_UPDATE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Editar permissões"]);
            case PermissionEnum::PERMISSION_DELETE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Eliminar permissões"]);

            case PermissionEnum::PERMISSION_ROLE_VIEW:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Visualizar cargos"]);
            case PermissionEnum::PERMISSION_ROLE_CREATE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Criar cargos"]);
            case PermissionEnum::PERMISSION_ROLE_UPDATE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Editar cargos"]);
            case PermissionEnum::PERMISSION_ROLE_DELETE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Eliminar cargos"]);

            case PermissionEnum::PERMISSION_USER_VIEW:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Visualizar utilizadores"]);
            case PermissionEnum::PERMISSION_USER_CREATE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Criar utilizadores"]);
            case PermissionEnum::PERMISSION_USER_UPDATE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Editar utilizadores"]);
            case PermissionEnum::PERMISSION_USER_DELETE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Eliminar utilizadores"]);

            default:
                throw new Exception("code: {$code} not found");
        }
    }

    public static function all(){
        return [
            static::getData(PermissionEnum::PERMISSION_VIEW),
            static::getData(PermissionEnum::PERMISSION_CREATE),
            static::getData(PermissionEnum::PERMISSION_UPDATE),
            static::getData(PermissionEnum::PERMISSION_DELETE),

            static::getData(PermissionEnum::PERMISSION_ROLE_VIEW),
            static::getData(PermissionEnum::PERMISSION_ROLE_CREATE),
            static::getData(PermissionEnum::PERMISSION_ROLE_UPDATE),
            static::getData(PermissionEnum::PERMISSION_ROLE_DELETE),

            static::getData(PermissionEnum::PERMISSION_USER_VIEW),
            static::getData(PermissionEnum::PERMISSION_USER_CREATE),
            static::getData(PermissionEnum::PERMISSION_USER_UPDATE),
            static::getData(PermissionEnum::PERMISSION_USER_DELETE),
        ];
    }

}
