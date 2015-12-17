<?php

/**
 * Class DatabaseFactory.php
 *
 * Class documentation
 *
 * @author: Jonty Sponselee <jonty_wolf@hotmail.com>
 * @since: 16/12/2015
 * @version 0.1 16/12/2015 Initial class definition.
 */
class DatabaseFactory
{
    private static $database;

    public static function getDatabase(){
        if(!self::$database){
            self::$database = new Database(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
        }
        return self::$database;
    }
}