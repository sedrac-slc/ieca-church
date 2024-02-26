<?php
namespace App\Enum;

class CommonFields{

    public const ID = 'id';

    public const UPDATED_AT = 'updated_at';
    public const CREATED_AT = 'created_at';
    public const DELETED_AT = 'deleted_at';

    public const CREATED_BY = 'created_by';
    public const UPDATED_BY = 'updated_by';
    public const DELETED_BY = 'deleted_by';

    private const FIELDS = [
        CommonFields::ID,
        CommonFields::UPDATED_AT,
        CommonFields::CREATED_AT,
        CommonFields::DELETED_AT,
        CommonFields::CREATED_BY,
        CommonFields::UPDATED_BY,
        CommonFields::DELETED_BY
    ];

    public function join(array $fields): array{
        return array_merge(CommonFields::FIELDS, $fields);
    }

}
