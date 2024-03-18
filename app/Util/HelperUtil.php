<?php

namespace App\Util;

final class HelperUtil{

    static function toString(array $data){
        return "[".collect($data)->map(function($value, $key){
            return $key."=".$value;
        })->join(",")."]";
    }

}
