<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory, HasUuids;

    public const TABLE = "permission_role";

    public const PERMISSION_ID = "permission_id";
    public const ROLE_ID = "role_id";

    protected $table = PermissionRole::TABLE;

}
