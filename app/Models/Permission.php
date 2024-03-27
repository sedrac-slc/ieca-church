<?php

namespace App\Models;

use App\Enum\Concrect\CommonFields;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory, HasUuids;

    public const TABLE = "permissions";

    public const NAME = "name";
    public const DESCRIPTION = "description";

    protected $table = Permission::TABLE;

    protected $fillable = [
        Permission::NAME,
        Permission::DESCRIPTION,

        CommonFields::ID,
        CommonFields::ID,
        CommonFields::UPDATED_AT,
        CommonFields::CREATED_AT,
        CommonFields::DELETED_AT,
        CommonFields::CREATED_BY,
        CommonFields::UPDATED_BY,
        CommonFields::DELETED_BY,
        CommonFields::VALUE_JOIN
    ];

    public static function commonFields(){
        return commonFields(Permission::TABLE);
    }

    public static function fields(string $field){
        return Permission::TABLE.SEPARATOR_POINT.$field;
    }

    public function roles():  BelongsToMany{
        return $this->belongsToMany(Role::class, PermissionRole::TABLE);
    }

}
