<?php

namespace App\Http\Controllers;

use App\Enum\Concrect\RouteNavigator;
use App\Enum\Seeder\PermissionEnum;
use App\Exceptions\NotFoundException;
use App\Exceptions\PermissionDeneidException;
use App\Http\Requests\DeleteRequest;
use App\Http\Requests\Post\BaptismUserPostRequest;
use App\Http\Requests\Put\BaptismUserPutRequest;
use App\Models\BaptismUser;
use App\Services\BaptismUserService;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;

class BaptismUserController extends Controller
{
    private RouteNavigator $route;
    private BaptismUserService $baptismUserService;

    function __construct(){
        $this->route = navigator(RouteNavigator::PERMISSIONS);
        $this->baptismUserService = new BaptismUserService();
    }

    public function index(){
        try{
            permission(PermissionEnum::PERMISSION_BAPTISM_VIEW);
            return to_render('View/Baptism',[ 'baptisms' => BaptismUser::paginate() ]);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }
    }

    public function store(BaptismUserPostRequest $request): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_BAPTISM_CREATE);
            $this->baptismUserService->save($request);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }catch(UniqueConstraintViolationException){
            return to_route($this->route->index);
        }
    }

    public function update(BaptismUserPutRequest $request): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_BAPTISM_UPDATE);
            $this->baptismUserService->update($request);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }catch(UniqueConstraintViolationException){
            return to_route($this->route->index);
        }catch(NotFoundException){
            return to_route($this->route->index);
        }
    }

    public function delete(DeleteRequest $request): RedirectResponse{
        try{
            permission(PermissionEnum::PERMISSION_BAPTISM_DELETE);
            $this->baptismUserService->delete($request->id);
            return to_route($this->route->index);
        }catch(PermissionDeneidException){
            return to_route($this->route->index);
        }catch(NotFoundException){
            return to_route($this->route->index);
        }
    }
}
