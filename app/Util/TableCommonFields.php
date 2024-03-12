<?php

namespace App\Util;

use App\Enum\Concrect\CommonFields;

class TableCommonFields extends CommonFields{
    private string $table;

    private string $id;

    private string $updated_at;
    private string $created_at;
    private string $deleted_at;

    private string $created_by;
    private string $updated_by;
    private string $deleted_by;

    function __construct(string $table){
        $this->table = $table;
        $this->id = $table . SEPARATOR_POINT .static::ID;
        $this->updated_at = $table . SEPARATOR_POINT .static::UPDATED_AT;
        $this->created_at = $table . SEPARATOR_POINT .static::CREATED_AT;
        $this->deleted_at = $table . SEPARATOR_POINT .static::DELETED_AT;
        $this->created_by = $table . SEPARATOR_POINT .static::CREATED_BY;
        $this->updated_by = $table . SEPARATOR_POINT .static::UPDATED_BY;
        $this->deleted_by = $table . SEPARATOR_POINT .static::DELETED_BY;
    }

    function __get($name){
        return $this->$name;
    }

}
