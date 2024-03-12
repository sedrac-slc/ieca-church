<?php

namespace App\Exceptions;

use Exception;

class PermissionDeneidException extends Exception{

   function __construct(){
        parent::__construct("Permission deneid", 403);
   }

}
