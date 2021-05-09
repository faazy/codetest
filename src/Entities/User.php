<?php

namespace App\Entities;

use App\Core\Database;

class User extends Database
{

    /**
     * @param $username
     * @return \Generator|string
     */
    public function getByUsername($username)
    {
        return $this->query("SELECT * FROM users WHERE username = :username", ['username' => $username])->current();
    }

}
