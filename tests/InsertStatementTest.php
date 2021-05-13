<?php

require_once '../vendor/autoload.php';
require_once 'AbstractStatementTest.php';

use kevinoo\QueryParser\Parser;
use kevinoo\QueryParser\Statement\InsertStatement;


class InsertStatementTest extends AbstractStatementTest {

    public function testQueryIsInsertStatement(): void {
        $this->assertInstanceOf(
            InsertStatement::class,
            Parser::parse(static::STATEMENTS['insert'])
        );
    }

    public function testTableNameIsUsers(): void {
        $this->assertEquals(
            'users',
            Parser::parse(static::STATEMENTS['insert'])->getTableName()
        );
    }

}
