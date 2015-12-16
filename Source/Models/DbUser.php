<?php

/**
 * Class user.php
 *
 * Class documentation
 *
 * @author: Jonty Sponselee <jonty_wolf@hotmail.com>
 * @since: 14/12/2015
 * @version 0.1 14/12/2015 Initial class definition.
 */
class DbUser
{
    public $firstName;
    public $lastName;
    public $mobile;
    public $telephone;

    public $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName =  $lastName;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getMobiel()
    {
        return $this->mobile;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }
}