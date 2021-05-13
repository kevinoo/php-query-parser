<?php

namespace kevinoo\QueryParser;

use DateTime;


/**
 *
*/
abstract class AbstractStatement {

    protected string $table_name;



    ///////////////////////////////////////
    // Utils

    public function isInsertQuery(): bool {
        return false;
    }
    public function isUpdateQuery(): bool {
        return false;
    }
    public function isDeleteQuery(): bool {
        return false;
    }

    ///////////////////////////////////////
    // Getters and setters

    /**
     * @return string
     */
    public function getTableName(): string {
        return $this->table_name;
    }

    /**
     * @param string $table_name
     * @return Statement
     */
    public function setTableName( string $table_name ): self {
        $this->table_name = $table_name;
        return $this;
    }

}
