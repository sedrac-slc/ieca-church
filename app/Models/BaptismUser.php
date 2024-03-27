<?php

namespace App\Models;

use App\Enum\Concrect\CommonFields;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaptismUser extends Model
{
    use HasFactory, HasUuids;

    public const TABLE = "baptism_users";

    public const USER_ID = "user_id";

    public const BAPTISM_CONGREGATION = "baptism_congregation";
    public const BAPTISM_LOCAL = "baptism_local";
    public const BAPTISM_DATE = "baptism_date";

    public const CONFIRM_CONGREGATION = "confirm_congregation";
    public const CONFRIM_LOCAL = "confirm_local";
    public const CONFRIM_DATE = "confirm_date";

    public const RECEIVED_CONGREGATION = "received_congregation";
    public const RECEIVED_LOCAL = "received_local";
    public const RECEIVED_DATE = "received_date";

    public const ISSUED_ON = "ISSUED_ON";

    protected $table = BaptismUser::TABLE;

    protected $fillable = [
        BaptismUser::USER_ID,

        BaptismUser::BAPTISM_CONGREGATION,
        BaptismUser::BAPTISM_LOCAL,
        BaptismUser::BAPTISM_DATE,

        BaptismUser::CONFIRM_CONGREGATION,
        BaptismUser::CONFRIM_LOCAL,
        BaptismUser::CONFRIM_DATE,

        BaptismUser::RECEIVED_CONGREGATION,
        BaptismUser::RECEIVED_LOCAL,
        BaptismUser::RECEIVED_DATE,

        BaptismUser::ISSUED_ON,

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
