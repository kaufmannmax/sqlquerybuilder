<?php

namespace kaufmannmax\SQLQueryBuilder\Entities;

use InvalidArgumentException;

readonly class Where extends BasicEntities
{
    public function __construct(
        protected string $fieldName,
    ){

    }

    public static function tryFromString(string $newValue):self{
        if(self::checkValue($newValue)){
            return new self($newValue);
        }
        throw new InvalidArgumentException('Field '.$newValue.' is not valid');
    }

    public static function checkValue(string $field):bool{
        $field=trim($field);



        if (!empty($field)) {
            return true;
        }

        return false;
    }

}