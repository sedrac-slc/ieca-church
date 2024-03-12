<?php

namespace App\Http\Controllers;

use App\Exceptions\PermissionDeneidException;
use App\Enum\Seeder\PermissionEnum;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;

use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
    public function index(){
        try{
            permission(PermissionEnum::PERMISSION_VIEW);
            return to_render('View/Permission',[ 'permissions' => Permission::all() ]);
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_VIEW);
        }
    }

    public function store(PermissionRequest $request): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_CREATE);
            return to_route('permissions.index');
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_CREATE);
        }
    }

    public function update(PermissionRequest $request, $id): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_UPDATE);
            return to_route('permissions.index');
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_UPDATE);
        }
    }

    public function delete($id): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_DELETE);
            return to_route('permissions.index');
        }catch(PermissionDeneidException){
            return to_permission_deneid(PermissionEnum::PERMISSION_DELETE);
        }
    }

}
