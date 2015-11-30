<?php

/**
 * Class Users.php
 *
 * Class documentation
 *
 * @author: Jonty Sponselee <jonty_wolf@hotmail.com>
 * @since: 30/11/2015
 * @version 0.1 30/11/2015 Initial class definition.
 */
class Users
{
    public $userList = [];

    public function save($dataKey, $user)
    {
        $this->userList[$dataKey] = $user;
    }

    public function getUserList()
    {
        return $this->userList;
    }

}