<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index(){
        return Inertia::render('View/Role');
    }

    public function store(RoleRequest $request){
        return Inertia::render('View/Role');
    }

    public function update(RoleRequest $request, $id){
        return Inertia::render('View/Role');
    }

    public function delete(){
        return Inertia::render('View/Role');
    }

}
