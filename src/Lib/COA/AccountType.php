<?php

namespace Obelaw\Accounting\Lib\COA;

use Obelaw\Accounting\Lib\COA\AccountRules\DefaultRules;

class AccountType
{
    private static array $typs = [];

    public static function addType($key, $label, $rules = null)
    {

        $type = [
            $key => [
                'key' => $key,
                'label' => $label,
                'rules' => $rules ?? DefaultRules::class
            ]
        ];

        static::$typs = array_merge(static::$typs, $type);
    }

    public static function getTypes()
    {
        return static::$typs;
    }

    public static function instanceRules($key)
    {
        return new static::$typs[$key]['rules'];
    }
}
