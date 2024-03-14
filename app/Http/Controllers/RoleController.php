<?php

namespace App\Http\Controllers;

use App\Enum\Concrect\RouteNavigator;
use App\Exceptions\PermissionDeneidException;
use Illuminate\Http\RedirectResponse;
use App\Enum\Seeder\PermissionEnum;
use App\Http\Requests\RoleRequest;
use App\Models\Role;

class RoleController extends Controller{

    private RouteNavigator $route;

    function __construct(){
        $this->route = navigator(RouteNavigator::ROLES);
    }

    public function index(){
        try{
            permission(PermissionEnum::PERMISSION_ROLE_VIEW);
            return to_render('View/Role',[ 'roles' => Role::paginate()]);
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_ROLE_VIEW);
        }
    }

    public function store(RoleRequest $request): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_ROLE_CREATE);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_ROLE_CREATE);
        }
    }

    public function update(RoleRequest $request, $id): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_ROLE_UPDATE);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_ROLE_UPDATE);
        }
    }

    public function delete($id): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_ROLE_DELETE);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_ROLE_DELETE);
        }
    }

}
