<?php

namespace kaufmannmax\SQLQueryBuilder\Entities;

abstract class BasicEntities
{
    public function __construct(
        protected string $fieldName,
    ) {}

    public function __toString(): string
    {
        return $this->getValue();
    }

    public static function checkValue(string $field): bool
    {
        $field = trim($field);
        if (!empty($field)) {
            return true;
        }

        return false;
    }

    public function getValue(): string
    {
        return $this->fieldName;
    }
}
