<?php

namespace App\Models;

use App\Util\TableCommonFields;
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
        Role::TYPE_SYSTEM
    ];

    public static function commonFields(){
        return new TableCommonFields(Role::TABLE);
    }

    public static function fields(string $field){
        return Role::TABLE.SEPARATOR_POINT.$field;
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
