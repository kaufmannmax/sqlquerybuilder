<?php

namespace Unit;

use kaufmannmax\SQLQueryBuilder\SQLQueryBuilder;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class SQLQueryBuilderTest extends TestCase
{
    protected SQLQueryBuilder $sqlquerybuilder;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->sqlquerybuilder = new SQLQueryBuilder();
    }

    #[Test]
    #[TestDox('Basic SQL Query Example')]
    #[Group('Golivetest')]
    public function testExample1(): void
    {
        $this->sqlquerybuilder->select('name');
        $this->sqlquerybuilder->select('name');
        $this->sqlquerybuilder->select('username');
        $this->sqlquerybuilder->select(' ');
        $this->sqlquerybuilder->from('users');
        $this->sqlquerybuilder->from('users');
        $this->sqlquerybuilder->where('username="test"');

        $result = $this->sqlquerybuilder->asSQL();

        $this->assertSame('SELECT name, username FROM users WHERE username="test"', $result);
    }

    #[Test]
    #[TestDox('Basic SQL Query Example')]
    #[Group('Golivetest')]
    public function testExample2(): void
    {
        $this->sqlquerybuilder->select('name')->orderBy('name')->select('username')->from('users')->where('username="test"');

        $result = $this->sqlquerybuilder->asSQL();

        $this->assertSame('SELECT name, username FROM users WHERE username="test"', $result);
    }


}
