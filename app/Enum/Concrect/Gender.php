<?php
namespace App\Enum\Concrect;

final class Gender{

    public const MALE = "MALE";
    public const FEMALE = "FEMALE";

    public static function values() : array{
        return [
            Gender::MALE => 'Masculino',
            Gender::FEMALE => 'Femenino',
        ];
    }

    public static function keys(): array {
        return array_keys(static::values());
    }

    public static function regex(): string{
        return "regex:/[".collect(static::keys())->join("|")."]/u";
    }

    public static function selects(): array {
        $selects = [];
        foreach(static::values() as $key => $value) array_push($selects, $key.SEPARATOR_SELECT.$value);
        return $selects;
    }

}
