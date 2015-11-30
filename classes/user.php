<?php

/**
 * Class user.php
 *
 * Class documentation
 *
 * @author: Jonty Sponselee <jonty_wolf@hotmail.com>
 * @since: 30/11/2015
 * @version 0.1 30/11/2015 Initial class definition.
 */
class User
{
    public $users = [];

    /**
     * @var string
     */
    public $firstName;
    public $lastName ;
    public $mobile ;
    public $telNumber;

    /**
     * @return string
     */
    public function getTelNumber()
    {
        return $this->telNumber;
    }

    /**
     * @param string $telNumber
     */
    public function setTelNumber($telNumber)
    {
        $this->telNumber = $telNumber;
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param array $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    public function save($dataArray)
    {
        $i = 0;
        foreach($dataArray as $key => $value){
            $this->setFirstName($value[0]);
            $this->setLastName($value[1]);
            $this->setMobilthe($value[2]);
            $this->setTelNumber($value[3]);
            $i++;
        }
    }

}