<?php

namespace kevinoo\QueryParser;

use DateTime;


/**
 *
*/
abstract class InsertStatement extends AbstractStatement {


    ///////////////////////////////////////
    // Utils

    public function isInsertQuery(): bool {
        return true;
    }

    ///////////////////////////////////////
    // Getters and setters


}
