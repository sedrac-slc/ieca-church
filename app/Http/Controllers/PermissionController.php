<?php

namespace App\Http\Controllers;

use App\Enum\Seeder\PermissionEnum;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;

use Illuminate\Http\RedirectResponse;

use Inertia\{ Response, Inertia };

class PermissionController extends Controller
{
    public function index() : Response{
        permission(PermissionEnum::PERMISSION_VIEW);
        return to_render('View/Permission',[
            'permissions' => Permission::all()
        ]);
    }

    public function store(PermissionRequest $request): RedirectResponse{
        permission(PermissionEnum::PERMISSION_CREATE);
        return to_route('permissions.index');
    }

    public function update(PermissionRequest $request, $id): RedirectResponse{
        permission(PermissionEnum::PERMISSION_UPDATE);
        return to_route('permissions.index');
    }

    public function delete($id): RedirectResponse{
        permission(PermissionEnum::PERMISSION_DELETE);
        return to_route('permissions.index');
    }

}
