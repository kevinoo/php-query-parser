<?php

namespace kevinoo\QueryParser\Statement;

use Exception;


/**
 *
*/
class DeleteStatement extends AbstractStatement {


    public function parseQuery(){

        preg_match("/DELETE FROM `?(?<table_name>\w+)`?[ ]+WHERE[ ]*(?:`\w+`\.)?`?(?<where_key>[\w]+)`? ?(?:IN|=) ?(?:'?(?<id>\d+)'?|\((?<ids>[\d,]+)\))/", $this->getQuery(), $matches );

        if( empty($matches) ){
            throw new Exception('Unrecognizable table name');
        }

        $this->setTableName($matches['table_name']);
        $this->setWhereConditions([
            $matches['where_key'] => explode(',', $matches['ids'] ?? $matches['id'] )
        ]);

    }


    ///////////////////////////////////////
    // Utils

    public function isDeleteQuery(): bool {
        return true;
    }

    ///////////////////////////////////////
    // Getters and setters


}
