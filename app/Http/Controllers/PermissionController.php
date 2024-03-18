<?php

namespace App\Http\Controllers;

use App\Enum\Concrect\RouteNavigator;
use App\Exceptions\PermissionDeneidException;
use App\Enum\Seeder\PermissionEnum;
use App\Exceptions\NotFoundException;
use App\Http\Requests\DeleteRequest;
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\Post\PermissionPostRequest;
use App\Http\Requests\Put\PermissionPutRequest;
use App\Models\Permission;
use App\Services\PermissionService;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller{

    private RouteNavigator $route;
    private PermissionService $permissionService;

    function __construct(){
        $this->route = navigator(RouteNavigator::PERMISSIONS);
        $this->permissionService = new PermissionService();
    }

    public function index(){
        try{
            permission(PermissionEnum::PERMISSION_VIEW);
            return to_render('View/Permission',[ 'permissions' => Permission::paginate() ]);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }
    }

    public function store(PermissionPostRequest $request): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_ROLE_CREATE);
            $this->permissionService->save($request);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }catch(UniqueConstraintViolationException){
            return to_route($this->route->index);
        }
    }

    public function update(PermissionPutRequest $request): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_ROLE_UPDATE);
            $this->permissionService->update($request);
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
            $this->permissionService->delete($request->id);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }catch(NotFoundException){
            return to_route($this->route->index);
        }
    }

}
