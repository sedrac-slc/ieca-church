<?php
namespace App\Enum\Concrect;

class RouteNavigator{

    public const DASHBOARD = 'dashboard';
    public const PERMISSION_DENEID = 'permission-deneid';

    public const ROLES = 'roles';
    public const PERMISSIONS = 'permissions';
    public const USERS = 'users';

    private string $route;

    private string $index;
    private string $show;
    private string $edit;
    private string $create;
    private string $update;
    private string $delete;

    function __construct(string $route = null){
        if(isset($route)){
            $this->route = $route;
            $this->index = $route . ".index";
            $this->show = $route . ".show";
            $this->edit = $route . ".edit";
            $this->create = $route . ".create";
            $this->update = $route . ".update";
            $this->delete = $route . ".delete";
        }
    }

    function __get($name){
        return $this->$name;
    }

}
