<?php

namespace App\Util;

use App\Enum\Concrect\CommonFields;
use Illuminate\Database\Schema\Blueprint;


class BluePrintUtil{

    public static function primaryKey(Blueprint $table){
        $table->uuid(CommonFields::ID)->primary();
    }

    public static function commonFields(Blueprint $table){
        $table->timestamps();
        $table->text(CommonFields::VALUE_JOIN)->nullable();
        $table->uuid(CommonFields::DELETED_AT)->nullable();
        $table->uuid(CommonFields::CREATED_BY)->nullable();
        $table->uuid(CommonFields::UPDATED_BY)->nullable();
        $table->uuid(CommonFields::DELETED_BY)->nullable();
    }

}
