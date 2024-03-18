<?php

namespace App\Data;

use App\Enum\Concrect\CreatedUserType;
use App\Enum\Concrect\Gender;
use App\Enum\Concrect\MaritalStatus;
use App\Enum\Seeder\UserEnum;
use App\Models\User;
use Carbon\Carbon;
use Exception;

final class UserData
{

    private static function createUser($code, $bi): User{
        new User();
        return new User([
            User::EMAIL => sufix_email_system(strtolower($code)),
            User::IDENTITY_CARD => $bi,
            User::FULLNAME => "{$code}".SUFIX_FULLNAME,
            User::FULLNAME_FATHER => strtoupper("{$code} father"),
            User::FULLNAME_MOTHER => strtoupper("{$code} mother"),
            User::MARITAL_STATUS => MaritalStatus::SINGLE,
            User::GENDER => Gender::MALE,
            User::CREATED_USER_TYPE => CreatedUserType::SYSTEM,
            User::BIRTHDAY => Carbon::now()->subYears(18)->format('Y-m-d'),
            User::PASSWORD => bcrypt('12345678'),
        ]);
    }

    public static function getData($code)
    {
        switch ($code) {
            case UserEnum::SUPER:
                return static::createUser($code, "0090127TE08923");
            case UserEnum::USER:
                return static::createUser($code, "0090127TE08924");
            case UserEnum::ROLE:
                return static::createUser($code, "0090127TE08925");
            case UserEnum::PERMISSION:
                return static::createUser($code, "0090127TE08926");
            default:
                throw new Exception("code: {$code} not found");
        }
    }

    public static function all()
    {
        return [
            static::getData(UserEnum::SUPER),
            static::getData(UserEnum::USER),
            static::getData(UserEnum::ROLE),
            static::getData(UserEnum::PERMISSION),
        ];
    }
}
