<?php

/**
 * Class UserController.php
 *
 * Class documentation
 *
 * @author: Jonty Sponselee <jonty_wolf@hotmail.com>
 * @since: 14/12/2015
 * @version 0.1 14/12/2015 Initial class definition.
 */
class UserController
{
    private $dbUser;

    public function __construct(DbUser $dbUser)
    {
        $this->dbUser = $dbUser;
    }

    public function setFirstName($firstName)
    {
        $this->dbUser->setFirstName($firstName);
    }

    public function setLastName($lastName)
    {
        $this->dbUser->setLastName($lastName);
    }

    public function setMobile($mobile)
    {
        $this->dbUser->setMobile($mobile);
    }

    public function setTelephone($telephone)
    {
        $this->dbUser->setTelephone($telephone);
    }

    public function getFirstName()
    {
        return $this->dbUser->getFirstName();
    }

    public function getLastName()
    {
        return $this->dbUser->getLastName();
    }

    public function getMobile()
    {
        return $this->dbUser->getMobiel();
    }

    public function getTelephone()
    {
        return $this->dbUser->getTelephone();
    }

    public function userAsArray()
    {

    }
}
