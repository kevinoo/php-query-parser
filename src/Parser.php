<?php

namespace kevinoo\QueryParser;

use Exception;
use kevinoo\QueryParser\Statement\{
    AbstractStatement,
    InsertStatement,
    UpdateStatement,
    DeleteStatement,
    SelectStatement
};


/**
 *
 */
class Parser {

    const MYSQL_DELIMITER = '/*!*/;';
    const MYSQL_DUMP_DELIMITER = self::MYSQL_DELIMITER ."\n". self::MYSQL_DELIMITER;


    /**
     * @return InsertStatement|UpdateStatement|DeleteStatement|SelectStatement
     * @throws Exception
     * @noinspection SqlWithoutWhere
     */
    public static function parse( string $statement_string ){

        $statement_string = str_replace( [static::MYSQL_DELIMITER,"\t","\n","\r"],['',' ',' ',' '],$statement_string);

//        print_r($statement_string);
//        echo "\n\n";

        if( stripos($statement_string,'INSERT INTO ') !== false ){
            $statement = new InsertStatement();
        }elseif( stripos($statement_string,'UPDATE ') !== false ){
            $statement = new UpdateStatement();
        }elseif( stripos($statement_string,'DELETE FROM ') !== false ){
            $statement = new DeleteStatement();
        }elseif( stripos($statement_string,'SELECT ') !== false ){
            $statement = new SelectStatement();
        }else{
            throw new Exception('Query not managed');
        }

        $statement->setQuery($statement_string);
        $statement->parseQuery();

        return $statement;
    }

}
