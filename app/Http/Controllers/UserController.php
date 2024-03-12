<?php

namespace App\Http\Controllers;

use App\Enum\Seeder\PermissionEnum;
use App\Http\Requests\UserRequest;
use Illuminate\Http\RedirectResponse;
use App\Exceptions\PermissionDeneidException;

class UserController extends Controller
{
    public function index(){
        try{
            permission(PermissionEnum::PERMISSION_USER_VIEW);
            return to_render('View/User');
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_USER_VIEW);
        }
    }

    public function store(UserRequest $request): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_USER_CREATE);
            return to_route('users.index');
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_USER_CREATE);
        }
    }

    public function update(UserRequest $request, $id): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_USER_UPDATE);
            return to_route('users.index');
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_USER_UPDATE);
        }
    }

    public function delete($id): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_USER_DELETE);
            return to_route('users.index');
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_USER_DELETE);
        }
    }
}
