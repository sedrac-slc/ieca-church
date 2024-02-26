<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Inertia\Inertia;

class PermissionController extends Controller
{
    public function index(){
        return Inertia::render('View/Permission',[
            'permissions' => Permission::all()
        ]);
    }

    public function store(PermissionRequest $request){
        return Inertia::render('View/Permission');
    }

    public function update(PermissionRequest $request, $id){
        return Inertia::render('View/Permission');
    }

    public function delete(){
        return Inertia::render('View/Permission');
    }

}
