<?php

namespace core;

class Session
{
    public static function set($key,$value)
    {
        session_start();
        return $_SESSION[$key] = $value; 
    }

    public static function remove($key)
    {
        session_start();
        unset($_SESSION[$key]);
    }
}