<?php

namespace App\Models;

use App\Enum\Concrect\CommonFields;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, HasUuids;

    public const TABLE = "roles";

    public const NAME = "name";
    public const DESCRIPTION = "description";
    public const TYPE_SYSTEM = "type_system";

    protected $table = Role::TABLE;

    protected $fillable = [
        Role::NAME,
        Role::DESCRIPTION,
        Role::TYPE_SYSTEM,

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
        return commonFields(Role::TABLE);
    }

    public static function fields(string $field){
        return Role::TABLE.SEPARATOR_POINT.$field;
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, UserRole::TABLE);
    }

    public function permissions():  BelongsToMany{
        return $this->belongsToMany(Permission::class, PermissionRole::TABLE);
    }

}
