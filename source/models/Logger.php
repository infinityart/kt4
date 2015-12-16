<?php

/**
 * Class Logger.php
 *
 * Class documentation
 *
 * @author: Jonty Sponselee <jonty_wolf@hotmail.com>
 * @since: 14/12/2015
 * @version 0.1 14/12/2015 Initial class definition.
 */

class Logger
{
    public $fileUri;
    public $handle;

    public function setFileUri($fileUri)
    {
        $this->fileUri =  $fileUri;
    }

    public function setHandle($handle)
    {
        $this->handle = $handle;
    }

    public function getFileUri()
    {
        return $this->fileUri;
    }

    public function getHandle()
    {
        return $this->handle;
    }

    public function openFile($mode)
    {
        return fopen($this->getFileUri(), $mode);
    }

    public function closeFile()
    {
        return fclose($this->getHandle());
    }

    public function lineFile()
    {
        return fgets($this->getHandle(), 1000);
    }

    public function writeInFile($fileUri, $data)
    {
        $this->setFileUri($fileUri);
        $this->setHandle($this->openFile("a"));
        fwrite($this->getHandle(), implode($data, ', ') . "\n");
        $this->closeFile();
    }

    public function checkInFile($fileUri, $data)
    {
     //   $foo =  file($fileUri);
//var_dump($foo);

        $this->setFileUri($fileUri);
        $this->setHandle($this->openFile("r"));
        if($this->getHandle()){
            $match = 0;
            while(($buffer = $this->lineFile()) !== false){
                $buffer =  trim($buffer);
                if($buffer === implode($data, ', ')){
                    $match++;
                }
            }
            if (!feof($this->getHandle())){
                echo "Error: Onverwachte fget functie";
            }
            $this->closeFile();
        }
       if($match > 0){
           return true;
       }
        return false;
    }
}