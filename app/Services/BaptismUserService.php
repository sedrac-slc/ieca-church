<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Http\Requests\Post\BaptismUserPostRequest;
use App\Http\Requests\Put\BaptismUserPutRequest;
use App\Interface\IService;
use App\Models\BaptismUser;

class BaptismUserService implements IService{

    public function findById($id){
        $baptismUser =  BaptismUser::find($id);
        if(!isset($baptismUser->id)) throw new NotFoundException();
        return $baptismUser;
    }

    public function save(BaptismUserPostRequest $request){
        $data = $request->all();
        BaptismUser::create(store($data));
    }

    public function update(BaptismUserPutRequest $request){
        $data = $request->all();
        $baptismUser = $this->findById($request->id);
        $baptismUser->update(modify($data));
    }

    public function delete(string $id){
        $baptismUser = $this->findById($id);
        $baptismUser->delete();
    }

}
