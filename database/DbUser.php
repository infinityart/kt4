<?php

/**
 * Class DbUser.php
 *
 * Class documentation
 *
 * @author: Jonty Sponselee <jonty_wolf@hotmail.com>
 * @since: 16/12/2015
 * @version 0.1 16/12/2015 Initial class definition.
 */
class DbUser
{
    private $db;

    public function __construct(db $db)
    {
        $this->db = $db;
    }
}