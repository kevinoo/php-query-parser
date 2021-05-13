<?php
/** @noinspection SqlResolve */

require_once '../vendor/autoload.php';

use kevinoo\QueryParser\Parser;
use kevinoo\QueryParser\Statement\InsertStatement;
use kevinoo\QueryParser\Statement\UpdateStatement;
use PHPUnit\Framework\TestCase;


class AbstractStatementTest extends TestCase {

    const STATEMENTS = [
        'insert' => "INSERT INTO users (name,address) VALUES ('kevinoo','my home'), ('Foo','his home')",
        'update' => "UPDATE users SET name='kevin', address='my home' WHERE user_id=1"
    ];

}
