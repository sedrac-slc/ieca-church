<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;
use App\Enum\{Gender, MaritalStatus};
use App\Enum\CommonFields;

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
    public const NUMBER_BI = "number_bi";
    public const FULLNAME = "fullname";
    public const FULLNAME_FATHER = "fullname_father";
    public const FULLNAME_MOTHER  = "fullname_mother";
    public const MARITAL_STATUS = "marital_status";
    public const GENDER = "gender";
    public const BIRTHDAY = "birthday";
    public const PASSWORD = "password";
    public const EMAIL_VERIFIED_AT = "email_verified_at";
    public const REMEMBER_TOKEN = "remember_token";

    protected $table = User::TABLE;

    protected $fillable = [
        User::EMAIL,
        User::NUMBER_BI,
        User::FULLNAME,
        User::FULLNAME_FATHER,
        User::FULLNAME_MOTHER,
        User::MARITAL_STATUS,
        User::GENDER,
        User::BIRTHDAY,
        User::PASSWORD,
        User::EMAIL_VERIFIED_AT,
        User::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        User::PASSWORD,
        User::REMEMBER_TOKEN,
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

}
