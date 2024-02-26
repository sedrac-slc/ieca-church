<?php

namespace App\Data;

use App\Models\Permission;
use App\Enum\PermissionEnum;
use Exception;

class PermissionData{

    public static function getData($code){
        switch($code){

            case PermissionEnum::PERMISSION_VIEW:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Visualizar Permissões"]);
            case PermissionEnum::PERMISSION_CREATE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Criar Permissões"]);
            case PermissionEnum::PERMISSION_UPDATE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Editar Permissões"]);
            case PermissionEnum::PERMISSION_DELETE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Eliminar Permissões"]);

            case PermissionEnum::PERMISSION_ROLE_VIEW:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Visualizar Cargos"]);
            case PermissionEnum::PERMISSION_ROLE_CREATE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Criar Cargos"]);
            case PermissionEnum::PERMISSION_ROLE_UPDATE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Editar Cargos"]);
            case PermissionEnum::PERMISSION_ROLE_DELETE:
                return new Permission([Permission::NAME => $code, Permission::DESCRIPTION => "Eliminar Cargos"]);

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

        ];
    }

}
