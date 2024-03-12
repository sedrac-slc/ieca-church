<?php
namespace App\Enum\Concrect;

final class CreatedUserType{

    public const SYSTEM = "SYSTEM";
    public const APPLICATION = "APPLICATION";

    public static function values(){
        return [
            static::SYSTEM => 'Sistema',
            static::APPLICATION => 'Aplicação',
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
