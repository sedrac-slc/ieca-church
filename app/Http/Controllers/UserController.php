<?php

namespace App\Http\Controllers;

use App\Enum\Concrect\RouteNavigator;
use App\Enum\Seeder\PermissionEnum;
use App\Exceptions\NotFoundException;
use App\Exceptions\PermissionDeneidException;
use App\Http\Requests\Post\UserPostRequest;
use App\Http\Requests\Put\UserPutRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\UniqueConstraintViolationException;

class UserController extends Controller{

    private RouteNavigator $route;
    private UserService $userService;

    function __construct(){
        $this->route = navigator(RouteNavigator::USERS);
        $this->userService  = new UserService();
    }

    private function render($dt = []){
        $data = User::getSelects();
        $data["users"] = User::paginate();
        return to_render('View/User',array_merge($data, $dt));
    }

    public function index(){
        try{
            permission(PermissionEnum::PERMISSION_USER_VIEW);
            return $this->render();
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }
    }

    public function store(UserPostRequest $request): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_USER_CREATE);
            $this->userService->save($request);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }
    }

    public function update(UserPutRequest $request){
        try{
            permission(PermissionEnum::PERMISSION_USER_UPDATE);
            $this->userService->update($request);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }catch(UniqueConstraintViolationException){
            return to_route($this->route->index, ["" ]);
        }catch(NotFoundException){
            return to_route($this->route->index);
        }
    }

    public function delete($id): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_USER_DELETE);
            $this->userService->delete($id);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }catch(NotFoundException){
            return to_route($this->route->index);
        }
    }

}
