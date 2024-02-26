<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory, HasUuids;

    public const TABLE = "user_role";

    public const ID = "id";
    public const USER_ID = "user_id";
    public const ROLE_ID = "role_id";

    protected $table = UserRole::TABLE;


}
