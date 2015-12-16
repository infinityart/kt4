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
    public $fileUri;
    public $handle;

    public function setFileUri($fileUri)
    {
       $this->fileUri = $fileUri;
    }

    public function getFileUri()
    {
        return $this->fileUri;
    }

    public function setHandle($handle)
    {
        $this->handle =  $handle;
    }

    public function getHandle()
    {
        return $this->handle;
    }

    public function checkIfFileExist()
    {
        return file_exists($this->getFileUri());
    }

    public function openFile($mode)
    {
        return fopen($this->getFileUri(), $mode);
    }

    public function lineCSV()
    {
       return fgetcsv($this->getHandle(), 1000, ",");
    }

    public function closeFile()
    {
        return fclose($this->getHandle());
    }


}