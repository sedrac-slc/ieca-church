<?php

use App\Enum\Seeder\RoleEnum;
use App\Exceptions\PermissionDeneidException;
use App\Services\PermissionRoleService;
use App\Enum\Concrect\CommonFields;
use App\Enum\Concrect\RouteNavigator;
use App\Services\UserRoleService;
use App\Util\HelperUtil;
use Inertia\Inertia;
use Inertia\Response;
use Carbon\Carbon;

define("SEPARATOR_PIVOT","@");
define("SEPARATOR_POINT",".");
define("SUFIX_FULLNAME"," SYSTEM");
define("SUFIX_EMAIL_SYSTEM","@ieca.test.com");


if(!function_exists("permission")){
    function permission(string $permission){
        $userRoleService = new UserRoleService();
        if(!$userRoleService->rolesOfAuth([RoleEnum::ROLE_SUPER])){
            $permissionRoleService = new PermissionRoleService();
            if(!$permissionRoleService->permissionAnyRoleOfAuth($permission))
               throw new PermissionDeneidException();
        }
    }
}

if(!function_exists("sufix_email_system")){
    function sufix_email_system(string $email) : string{
        return $email . SUFIX_EMAIL_SYSTEM;
    }
}

if(!function_exists('commonFields')){
    function commonFields(string $table){
        return new CommonFields($table);
    }
}

if(!function_exists('modify')){
    function modify(array $data){
        $data[CommonFields::UPDATED_BY] = auth()->user()->id;
        $data[CommonFields::UPDATED_AT] = Carbon::now();
        $data[commonFields::VALUE_JOIN] = HelperUtil::toString($data);
        return $data;
    }
}

if(!function_exists('store')){
    function store(array $data){
        $data[CommonFields::CREATED_BY] = auth()->user()->id;
        $data[CommonFields::CREATED_AT] = Carbon::now();
        $data[commonFields::VALUE_JOIN] = HelperUtil::toString($data);
        return $data;
    }
}

if(!function_exists('navigator')){
    function navigator(string $table){
        return new RouteNavigator($table);
    }
}

if(!function_exists("to_render")){
    function to_render(string $panel, array $data = []) : Response{
        return Inertia::render($panel,$data);
    }
}

