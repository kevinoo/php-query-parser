<?php

require_once '../vendor/autoload.php';
require_once 'AbstractStatementTest.php';

use kevinoo\QueryParser\Parser;
use kevinoo\QueryParser\Statement\UpdateStatement;


class UpdateStatementTest extends AbstractStatementTest {

    public function testQueryIsInsertStatement(): void {
        $this->assertInstanceOf(
            UpdateStatement::class,
            Parser::parse(static::STATEMENTS['update'])
        );
    }

    public function testTableNameIsUsers(): void {
        $this->assertEquals(
            'users',
            Parser::parse(static::STATEMENTS['update'])->getTableName()
        );
    }

}
