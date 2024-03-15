<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    function __construct(){
        parent::__construct("Not found", 401);
   }
}
