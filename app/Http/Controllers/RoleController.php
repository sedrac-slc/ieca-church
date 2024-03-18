<?php

namespace App\Http\Controllers;

use App\Enum\Concrect\RouteNavigator;
use App\Exceptions\PermissionDeneidException;
use Illuminate\Http\RedirectResponse;
use App\Enum\Seeder\PermissionEnum;
use App\Exceptions\NotFoundException;
use App\Http\Requests\DeleteRequest;
use App\Http\Requests\Post\RolePostRequest;
use App\Http\Requests\Put\RolePutRequest;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Database\UniqueConstraintViolationException;

class RoleController extends Controller{

    private RouteNavigator $route;
    private RoleService $roleService;

    function __construct(){
        $this->route = navigator(RouteNavigator::ROLES);
        $this->roleService = new RoleService();
    }

    public function index(){
        try{
            permission(PermissionEnum::PERMISSION_ROLE_VIEW);
            return to_render('View/Role',[ 'roles' => Role::paginate()]);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }
    }

    public function store(RolePostRequest $request): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_ROLE_CREATE);
            $this->roleService->save($request);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }catch(UniqueConstraintViolationException){
            return to_route($this->route->index);
        }
    }

    public function update(RolePutRequest $request): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_ROLE_UPDATE);
            $this->roleService->update($request);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }catch(UniqueConstraintViolationException){
            return to_route($this->route->index);
        }catch(NotFoundException){
            return to_route($this->route->index);
        }
    }

    public function delete(DeleteRequest $request): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_ROLE_DELETE);
            $this->roleService->delete($request->id);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }catch(NotFoundException){
            return to_route($this->route->index);
        }
    }

}
