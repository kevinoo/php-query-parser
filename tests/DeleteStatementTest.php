<?php

require_once 'AbstractStatementTest.php';

use kevinoo\QueryParser\Parser;
use kevinoo\QueryParser\Statement\DeleteStatement;


class DeleteStatementTest extends AbstractStatementTest {

    public function testQueryIsDeleteStatement(): void {
        $this->assertInstanceOf(
            DeleteStatement::class,
            Parser::parse(static::STATEMENTS['delete_single'])
        );
    }

    public function testTableNameIsUsers(): void {
        $this->assertEquals(
            'users',
            Parser::parse(static::STATEMENTS['delete_single'])->getTableName()
        );
    }

    public function testWhereConditionsIsID_1(): void {

        $where = Parser::parse(static::STATEMENTS['delete_single'])->getWhereConditions();

        $where_key = key($where);

        $this->assertEquals('user_id',$where_key, 'The key of where_conditions ');
        $this->assertEquals(1,current($where[$where_key]), 'The value of where_conditions ');
    }

}
