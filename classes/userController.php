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
class userController
{
    private $User = null;

    public function __construct(User $user)
    {
        $this->User = $user;
    }

    public function setFirstName($firstName)
    {
        $this->User->setFirstName($firstName);
    }

    public function setLastName($lastName)
    {
        $this->User->setLastName($lastName);
    }

    public function setMobile($mobile)
    {
        $this->User->setMobile($mobile);
    }

    public function setTelephone($telephone)
    {
        $this->User->setTelephone($telephone);
    }

    public function getFirstName()
    {
        return $this->User->getFirstName();
    }

    public function getLastName()
    {
        return $this->User->getLastName();
    }

    public function getMobile()
    {
        return $this->User->getMobiel();
    }

    public function getTelephone()
    {
        return $this->User->getTelephone();
    }

    public function userAsArray()
    {

    }
}
