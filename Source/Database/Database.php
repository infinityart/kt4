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
class Database
{
    private $host = DB_HOST;
    private $name = DB_NAME;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;

    private $connection;
    private $queryResult;

    public function __construct($host, $name, $username, $password)
    {
        $this->connect($host, $name, $username, $password);
    }

    /**
     * @return string
     */
    private function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     */
    private function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    private function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    private function getPassword()
    {
        return $this->password;
    }

    private function connect($host, $name, $username, $password)
    {
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
                //$this->connection = new mysqli($this->getHost(), $this->getUsername(), $this->getPassword());
                $this->connection =  new mysqli($host, $username, $password);
                $this->createDatabase();
                $this->connection->select_db( $name );
                $this->createTables($tables);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
        return $this->connection;
    }

    private function createDatabase()
    {
        $sql = "CREATE DATABASE " . $this->getName();
        if($this->connection->query($sql) === true){
            return true;
        }else{
            return false;
        }
    }

    private function createTables($tables){
        foreach($tables as $tableKey => $table){
            $sql = "CREATE TABLE IF NOT EXISTS " . "`" .  $tableKey . "`" . " (";
            foreach($table as $column => $columnType){
                $sql .= "`" .$column . "`" ." " . $columnType;
                //TODO voeg "," tussen elke colum behalve de laatste
            }
            $sql .= ")";
            var_dump($sql);
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