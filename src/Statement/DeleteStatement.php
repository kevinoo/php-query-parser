<?php

namespace kevinoo\QueryParser;

use DateTime;


/**
 *
*/
abstract class DeleteStatement extends AbstractStatement {


    ///////////////////////////////////////
    // Utils

    public function isDeleteQuery(): bool {
        return true;
    }

    ///////////////////////////////////////
    // Getters and setters


}
