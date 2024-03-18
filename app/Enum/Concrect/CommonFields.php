<?php
namespace App\Enum\Concrect;

class CommonFields{

    public const ID = 'id';

    public const VALUE_JOIN = 'value_join';

    public const UPDATED_AT = 'updated_at';
    public const CREATED_AT = 'created_at';
    public const DELETED_AT = 'deleted_at';

    public const CREATED_BY = 'created_by';
    public const UPDATED_BY = 'updated_by';
    public const DELETED_BY = 'deleted_by';

    public const FIELDS = [
        CommonFields::ID,
        CommonFields::UPDATED_AT,
        CommonFields::CREATED_AT,
        CommonFields::DELETED_AT,
        CommonFields::CREATED_BY,
        CommonFields::UPDATED_BY,
        CommonFields::DELETED_BY,
        CommonFields::VALUE_JOIN
    ];

    private string $table;

    private string $id;
    private string $updated_at;
    private string $created_at;
    private string $deleted_at;
    private string $created_by;
    private string $updated_by;
    private string $deleted_by;

    function __construct(string $table = null){
        if(isset($table)){
            $this->table = $table;
            $this->id = $table . SEPARATOR_POINT .static::ID;
            $this->updated_at = $table . SEPARATOR_POINT .static::UPDATED_AT;
            $this->created_at = $table . SEPARATOR_POINT .static::CREATED_AT;
            $this->deleted_at = $table . SEPARATOR_POINT .static::DELETED_AT;
            $this->created_by = $table . SEPARATOR_POINT .static::CREATED_BY;
            $this->updated_by = $table . SEPARATOR_POINT .static::UPDATED_BY;
            $this->deleted_by = $table . SEPARATOR_POINT .static::DELETED_BY;
        }
    }

    function __get($name){
        return $this->$name;
    }

    public static function join(array $fields): array{
        return array_merge(CommonFields::FIELDS, $fields);
    }

}
