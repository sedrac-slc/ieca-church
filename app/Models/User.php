<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enum\Concrect\Gender;
use App\Enum\Concrect\MaritalStatus;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;
use App\Enum\Concrect\CommonFields;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public const TABLE = "users";

    public const EMAIL = "email";
    public const IDENTITY_CARD = "identity_card";
    public const FULLNAME = "fullname";
    public const FULLNAME_FATHER = "fullname_father";
    public const FULLNAME_MOTHER  = "fullname_mother";
    public const MARITAL_STATUS = "marital_status";
    public const GENDER = "gender";
    public const CREATED_USER_TYPE = "created_type";
    public const BIRTHDAY = "birthday";
    public const PASSWORD = "password";
    public const EMAIL_VERIFIED_AT = "email_verified_at";
    public const REMEMBER_TOKEN = "remember_token";

    public const PASSWORD_CONFIRMATION = "password_confirmation";

    protected $table = User::TABLE;

    protected $fillable = [
        User::EMAIL,
        User::IDENTITY_CARD,
        User::FULLNAME,
        User::FULLNAME_FATHER,
        User::FULLNAME_MOTHER,
        User::MARITAL_STATUS,
        User::GENDER,
        User::BIRTHDAY,
        User::PASSWORD,
        User::CREATED_USER_TYPE,
        User::EMAIL_VERIFIED_AT,
        User::REMEMBER_TOKEN,

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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $hidden = [
        User::PASSWORD,
        User::REMEMBER_TOKEN,
        User::EMAIL_VERIFIED_AT,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            User::EMAIL_VERIFIED_AT => 'datetime',
            User::PASSWORD => 'hashed',
        ];
    }

    public static function getSelects(){
        return [
            'separator' => SEPARATOR_SELECT,
            'genders' => Gender::selects(),
            'maritalStatus' => MaritalStatus::selects(),
        ];
    }

    public function baptism_user():  HasOne{
        return $this->hasOne(BaptismUser::class);
    }

    public function roles():  BelongsToMany{
        return $this->belongsToMany(Role::class, UserRole::TABLE);
    }

}
