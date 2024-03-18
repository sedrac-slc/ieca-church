<?php

namespace App\Services;

use App\Enum\Concrect\CommonFields;
use App\Exceptions\NotFoundException;
use App\Http\Requests\Post\PermissionPostRequest;
use App\Http\Requests\Put\PermissionPutRequest;
use App\Interface\ISearchName;
use App\Interface\IService;
use App\Models\Permission;
use App\Models\User;
use Carbon\Carbon;

class PermissionService implements IService, ISearchName{

    public function findById($id){
        $permission =  Permission::find($id);
        if(!isset($permission->id)) throw new NotFoundException();
        return $permission;
    }

    public function findByName(string $name){
        return Permission::where(Permission::NAME,$name)->first();
    }

    public function saveOrUpdateSeeder(Permission $permission, User $user){
        $data = $permission->getAttributes();
        $data[CommonFields::CREATED_BY] = $data[CommonFields::UPDATED_BY] = $user->id;
        $data[CommonFields::CREATED_AT] = $data[CommonFields::UPDATED_AT] = Carbon::now();
        Permission::updateOrCreate([Permission::NAME => $permission->name], $data);
    }

    public function save(PermissionPostRequest $request){
        $data = $request->all();
        Permission::create(store($data));
    }

    public function update(PermissionPutRequest $request){
        $data = $request->all();
        $permission = $this->findById($request->id);

        $permission->update(modify([
            Permission::NAME => $data[Permission::NAME],
            Permission::DESCRIPTION => $data[Permission::DESCRIPTION]
        ]));
    }

    public function delete(string $id){
        $permission = $this->findById($id);
        $permission->delete();
    }

}
