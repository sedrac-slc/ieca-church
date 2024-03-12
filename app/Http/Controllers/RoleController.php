<?php

namespace App\Http\Controllers;

use App\Enum\Seeder\PermissionEnum;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\{RedirectResponse};
use Inertia\{ Response, Inertia };

class RoleController extends Controller
{
    public function index(): Response{
        permission(PermissionEnum::PERMISSION_ROLE_VIEW);
        return Inertia::render('View/Role');
    }

    public function store(RoleRequest $request): RedirectResponse{
        permission(PermissionEnum::PERMISSION_ROLE_CREATE);
        return to_route('role.index');
    }

    public function update(RoleRequest $request, $id): RedirectResponse{
        permission(PermissionEnum::PERMISSION_ROLE_UPDATE);
        return to_route('role.index');
    }

    public function delete($id): RedirectResponse{
        permission(PermissionEnum::PERMISSION_ROLE_DELETE);
        return to_route('role.index');
    }

}
