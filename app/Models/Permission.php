<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

}