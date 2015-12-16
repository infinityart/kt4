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
    static public $connection;

    static public function getConnection()
    {
       // self::$connection = DB_HOST, DB_USERNAME, DB_PASSWORD;
    }
}