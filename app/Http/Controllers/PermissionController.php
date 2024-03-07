<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\{RedirectResponse, Request };
use Inertia\{ Response, Inertia };
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index() : Response{
        return Inertia::render('View/Permission',[
            'permissions' => Permission::all()
        ]);
    }

    public function store(PermissionRequest $request): RedirectResponse{
        return Redirect::route('permission.index');
    }

    public function update(PermissionRequest $request, $id): RedirectResponse{
        return Redirect::route('permission.index');
    }

    public function delete(): RedirectResponse{
        return Redirect::route('role.index');
    }

}
