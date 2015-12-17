<?php

/**
 * Class User.php
 *
 * Class documentation
 *
 * @author: Jonty Sponselee <jonty_wolf@hotmail.com>
 * @since: 16/12/2015
 * @version 0.1 16/12/2015 Initial class definition.
 */

//TODO SEquentie diagram maken


class Database
{
    /**
     * @var $connection mysqli|object
     */
    private $connection;
    /**
     * @var $queryResult string
     */
    private $queryResult;

    /**
     * Database constructor.
     * @param $host
     * @param $name
     * @param $username
     * @param $password
     */
    public function __construct($host, $name, $username, $password)
    {
        $this->connect($host, $name, $username, $password);
    }

    /**
     * @param $host
     * @param $name
     * @param $username
     * @param $password
     * @return mysqli|object
     */
    private function connect($host, $name, $username, $password)
    {
        // Test Table array
        $tables = [
            'user' => [
                'id' => "INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY",
                'firstname' => "VARCHAR(255) NOT NULL",
            ],
            'car' => [
                'id' => "INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY",
                'cartype' => "VARCHAR(255) NOT NULL"
            ]
        ];


        if($this->connection === null) {
            try{
                $this->connection =  new mysqli($host, $username, $password);
                $this->createDatabase();
                $this->connection->select_db($name);
                $this->createTables($tables);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
        return $this->connection;
    }

    /**
     * @return bool
     */
    private function createDatabase()
    {
        $query = "CREATE DATABASE IF NOT EXIST" . DB_NAME;
        if($this->connection->query($query) === true){
            // Database Created
            return true;
        }else{
            // Database Already exist
            return false;
        }
    }

    private function createTables($tables){
        foreach($tables as $tableKey => $table){
            $query = "CREATE TABLE IF NOT EXISTS " . "`" .  $tableKey . "`" . " (";
            foreach($table as $column => $columnType){
                $query .= "`" .$column . "`" ." " . $columnType . ", ";
            }

            $query = substr($query, 0, strlen($query) - 2);
            $query .= ")";

            var_dump($query);
        }
    }

    private function disconnect()
    {
        $this->connection = null;
    }

    public function __destruct()
    {
        $this->disconnect();
    }
}