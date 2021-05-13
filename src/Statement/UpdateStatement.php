<?php

namespace kevinoo\QueryParser;

use DateTime;


/**
 *
*/
abstract class UpdateStatement extends AbstractStatement {


    ///////////////////////////////////////
    // Utils

    public function isUpdateQuery(): bool {
        return true;
    }

    ///////////////////////////////////////
    // Getters and setters


}
