<?php

namespace App\Http\Controllers;

use App\Enum\Concrect\RouteNavigator;
use App\Enum\Seeder\PermissionEnum;
use Illuminate\Http\RedirectResponse;
use App\Exceptions\PermissionDeneidException;
use App\Http\Requests\Post\UserPostRequest;
use App\Http\Requests\Put\UserPutRequest;
use App\Models\User;
use App\Services\UserService;
use Exception;

class UserController extends Controller{

    private RouteNavigator $route;
    private UserService $userService;

    function __construct(){
        $this->route = navigator(RouteNavigator::USERS);
        $this->userService  = new UserService();
    }

    public function index(){
        try{
            permission(PermissionEnum::PERMISSION_USER_VIEW);
            $data = User::getSelects();
            $data["users"] = User::paginate();
            return to_render('View/User',$data);
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_USER_VIEW);
        }
    }

    public function store(UserPostRequest $request): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_USER_CREATE);
            $this->userService->save($request);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_USER_CREATE);
        }
    }

    public function update(UserPutRequest $request, $id): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_USER_UPDATE);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_USER_UPDATE);
        }
    }

    public function delete($id): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_USER_DELETE);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_USER_DELETE);
        }
    }
}
