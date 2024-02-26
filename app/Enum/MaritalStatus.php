<?php
namespace App\Enum;

class MaritalStatus{

    public const MARRIED = "MARRIED";
    public const SINGLE = "SINGLE";
    public const DIVORCED = "DIVORCED";
    public const WIDOWER = "WIDOWER";

    public static function values(){
        return [
            MaritalStatus::MARRIED => 'Casado (a)',
            MaritalStatus::SINGLE => 'Solteiro (a)',
            MaritalStatus::DIVORCED => 'Divorciado (a)',
            MaritalStatus::WIDOWER => 'Viúvo (a)',
        ];
    }

    public static function keys() {
        return array_keys(static::values());
    }

    public static function selects() {
        $selects = [];
        foreach(static::values() as $key => $value) array_push($selects, $key.SEPARATOR_SELECT.$value);
        return $selects;
    }

}
