<?php

namespace kevinoo\QueryParser\Statement;

use Exception;


/**
 *
*/
class SelectStatement extends AbstractStatement {


    public function parseQuery(){

    }


    ///////////////////////////////////////
    // Utils

    public function isSelectQuery(): bool {
        return true;
    }

    ///////////////////////////////////////
    // Getters and setters

}
