<?php

namespace kevinoo\QueryParser\Statement;

use Exception;


/**
 *
*/
class InsertStatement extends AbstractStatement {


    public function parseQuery(){

        preg_match('/INSERT INTO `?(?<table_name>\w+)`?[\s]*\((?<columns>.+)\)[\s]*VALUES[\s]*\((?<values>.+)\)/',$this->getQuery(),$matches);

        $this->setTableName($matches['table_name']);

        $this->setColumns( $this->normalizeColumnsString($matches['columns']) );
        $_values = preg_split('/\), \(/', $matches['values'] );

        $values = [];
        foreach( $_values as $row ){
            $values[] = array_combine(
                $this->getColumns(),
                $this->normalizeValuesString($row)
            );
        }

        $this->setValues($values);
    }


    ///////////////////////////////////////
    // Utils

    public function isInsertQuery(): bool {
        return true;
    }

    /**
     * @param $columns_string
     * @return array
     */
    protected function normalizeColumnsString( $columns_string ): array {
        return str_replace( ["`",' '],'', str_getcsv($columns_string) );
    }

    protected function normalizeValuesString( $values_string ): array {
        static $columns_count = null;

        if( $columns_count === null ){
            $columns_count = count($this->getColumns());
        }

        $_values = array_map(function($str){return trim(trim($str),"'");},str_getcsv($values_string,','));
        if( count($_values) != $columns_count ){
            $_values = array_map(function($str){return trim(trim($str),"'");},str_getcsv($values_string,',',"'"));
        }

        return $_values;
    }

    ///////////////////////////////////////
    // Getters and setters


}
