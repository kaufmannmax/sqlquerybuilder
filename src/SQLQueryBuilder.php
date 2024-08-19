<?php

namespace kaufmannmax;

use InvalidArgumentException;
use kaufmannmax\SQLQueryBuilder\Entities\From;
use kaufmannmax\SQLQueryBuilder\Entities\OrderBy;
use kaufmannmax\SQLQueryBuilder\Entities\Select;
use kaufmannmax\SQLQueryBuilder\Entities\Where;

class SQLQueryBuilder
{
    /**
     * @param Select[] $select
     * @param From[] $from
     * @param Where[] $where
     * @param OrderBy[] $orderBy
     */
    public function __construct(
        protected array $select = [],
        protected array $from = [],
        protected array $where = [],
        protected array $orderBy = []
    ) {}

    public function select(string $field): self
    {
        try {
            $value = Select::tryFromString($field);

            if (!in_array($field, $this->select, true)) {
                $this->select[] = $value;
            }

        } catch (InvalidArgumentException) {
        }

        return $this;
    }

    public function from(string $table): self
    {
        try {
            $value = From::tryFromString($table);

            if (!in_array($table, $this->from, true)) {
                $this->from[] = $value;
            }
        } catch (InvalidArgumentException) {
        }
        return $this;
    }

    public function where(string $field): self
    {
        try {
            $value = Where::tryFromString($field);

            if (!in_array($field, $this->where, true)) {
                $this->where[] = $value;
            }
        } catch (InvalidArgumentException) {
        }
        return $this;
    }

    public function orderBy(string $field): self
    {
        try {
            $value = OrderBy::tryFromString($field);

            if (!in_array($field, $this->orderBy, true)) {
                $this->orderBy[] = $value;
            }
        } catch (InvalidArgumentException) {
        }

        return $this;
    }

    public function asSQL(): string
    {
        $sql = '';

        if (count($this->select) > 0) {
            $sql .= "SELECT " . implode(", ", $this->select);
        } else {
            $sql .= "SELECT *";
        }

        $sql .= " FROM " . implode(", ", $this->from);

        if (count($this->where) > 0) {
            $sql .= " WHERE " . implode(" AND ", $this->where);
        }

        if (count($this->orderBy) > 0) {
            $sql .= " ORDER BY " . implode(", ", $this->orderBy);
        }

        return $sql;
    }

}
