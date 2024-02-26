<?php

namespace App\Data;

use App\Models\User;
use App\Enum\{Gender, MaritalStatus};

class UserData{

    public const ADMIN = "ADMIN";
    public const SECRET = "SECRET";


    public static function getData($code){
        switch($code){
            case static::ADMIN:
                return new User([
                    User::EMAIL => "admin@ieca.com",
                    User::NUMBER_BI => "0090127LA08923",
                    User::FULLNAME => "Admin",
                    User::FULLNAME_FATHER => "Admin Father",
                    User::FULLNAME_MOTHER => "Admin Mother",
                    User::MARITAL_STATUS => MaritalStatus::SINGLE,
                    User::GENDER => Gender::MALE,
                    User::BIRTHDAY => "1990-01-02",
                    User::PASSWORD => bcrypt('12345678'),
                ]);
            default:
                return new User([
                    User::EMAIL => "secret@ieca.com",
                    User::NUMBER_BI => "0080127LA08923",
                    User::FULLNAME => "Secret",
                    User::FULLNAME_FATHER => "Secret Father",
                    User::FULLNAME_MOTHER => "Secret Mother",
                    User::MARITAL_STATUS => MaritalStatus::SINGLE,
                    User::GENDER => Gender::MALE,
                    User::BIRTHDAY => "1990-01-02",
                    User::PASSWORD => bcrypt('12345678'),
                ]);
        }
    }

    public static function all(){
        return [
            static::getData(static::ADMIN),
            static::getData(static::SECRET),
        ];
    }

}
