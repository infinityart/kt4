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
        return fopen($this->getHandle(), $mode);
    }

    public function closeFile()
    {
        return fclose($this->getHandle());
    }
}