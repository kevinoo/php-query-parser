<?php

namespace kevinoo\QueryParser\Statement;

use Exception;


/**
 *
*/
class UpdateStatement extends AbstractStatement {


    /**
     * @inheritDoc
     */
    public function parseQuery(){

        preg_match('/UPDATE (?:`\w+`\.)?`?(?<table_name>\w+)`?[ ]*SET/',$this->getQuery(),$matches );

        if( empty($matches) ){
            throw new Exception('Unrecognizable table name');
        }

        $this->setTableName($matches['table_name']);

        preg_match('/'. $this->getTableName() ."`?[ ]*SET (?<query_set>.+)[ ]*WHERE[ ]*(?:`\w+`\.)?`?(?<where_key>[\w]+)`? ?(?:IN|=) ?(?:'?(?<id>\d+)'?|\((?<ids>[\d,]+)\))/",$this->getQuery(),$matches );

        $string_query_set = $matches['query_set'];
        $where_key = $matches['where_key'];
        $where_condition_value = explode(',', $matches['ids'] ?? $matches['id'] );

        // I don't find anything
        if( empty($matches) ){
            throw new Exception('Unparsable query');
        }

        $this->setWhereConditions([
            $where_key => $where_condition_value
        ]);

        preg_match_all("/`?([\w]+)`? ?= ?(\w+\([a-zA-Z0-9, ']+\)|'?[\w ]*'?)/", str_replace(['  ','  ','  '],' ',$string_query_set), $matches );

        $this->setColumns( $this->normalizeStringToArray($matches[1]) );

        $this->setValues([array_combine(
            $this->getColumns(),
            // values
            $this->normalizeStringToArray($matches[2])
        )]);

    }


    ///////////////////////////////////////
    // Utils

    public function isUpdateQuery(): bool {
        return true;
    }

    protected function normalizeStringToArray( $string ): array {
        return array_map(function($str){ return trim(trim($str),"'"); },$string);
    }

    ///////////////////////////////////////
    // Getters and setters


}
