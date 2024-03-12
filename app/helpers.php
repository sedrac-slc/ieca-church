<?php
define("SEPARATOR_PIVOT","@");
define("SUFIX_EMAIL_SYSTEM","@ieca.test.com");

if(!function_exists("sufix_email_system")){
    function sufix_email_system(string $email) : string{
        return $email . SUFIX_EMAIL_SYSTEM;
    }
}

if(!function_exists("permission")){
    function permission(string $permission){
        dd($permission);
    }
}
