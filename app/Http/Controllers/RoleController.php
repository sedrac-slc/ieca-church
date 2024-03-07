<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\{RedirectResponse, Request };
use Inertia\{ Response, Inertia };

class RoleController extends Controller
{
    public function index(): Response{
        return Inertia::render('View/Role');
    }

    public function store(RoleRequest $request): RedirectResponse{
        return Redirect::route('role.index');
    }

    public function update(RoleRequest $request, $id): RedirectResponse{
        return Redirect::route('role.index');
    }

    public function delete(): RedirectResponse{
        return Redirect::route('role.index');
    }

}
