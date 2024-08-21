<?php

namespace kaufmannmax\SQLQueryBuilder\Entities;

use InvalidArgumentException;

class From extends BasicEntities
{
    public function __construct(
        protected string $fieldName,
    ) {
        parent::__construct($fieldName);
    }

    public static function tryFromString(string $newValue): self
    {
        if(self::checkValue($newValue)) {
            return new self($newValue);
        }
        throw new InvalidArgumentException('Field ' . $newValue . ' is not valid');
    }

}
