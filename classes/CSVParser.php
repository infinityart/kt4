<?php

/**
 * Class CSVParser.php
 *
 * Class documentation
 *
 * @author: Jonty Sponselee <jonty_wolf@hotmail.com>
 * @since: 30/11/2015
 * @version 0.1 30/11/2015 Initial class definition.
 */
class CSVParser
{
    public function checkIfFileExist($file)
    {
        return file_exists($file);
    }

    public function csvToArray($fileUri)
    {
        $dataArray = array_map('str_getcsv', file($fileUri));
        unset($dataArray[0]);
        return $dataArray;
    }
}