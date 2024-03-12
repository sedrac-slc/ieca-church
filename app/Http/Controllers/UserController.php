<?php

namespace App\Http\Controllers;

use App\Enum\Seeder\PermissionEnum;
use App\Http\Requests\UserRequest;
use Illuminate\Http\RedirectResponse;
use Inertia\{ Response, Inertia };

class UserController extends Controller
{
    public function index(): Response{
        permission(PermissionEnum::PERMISSION_USER_VIEW);
        return to_render('View/User');
    }

    public function store(UserRequest $request): RedirectResponse{
        permission(PermissionEnum::PERMISSION_USER_CREATE);
        return to_route('users.index');
    }

    public function update(UserRequest $request, $id): RedirectResponse{
        permission(PermissionEnum::PERMISSION_USER_UPDATE);
        return to_route('users.index');
    }

    public function delete($id): RedirectResponse{
        permission(PermissionEnum::PERMISSION_USER_DELETE);
        return to_route('users.index');
    }
}
