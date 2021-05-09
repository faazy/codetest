<?php
/**
 * @Author FaAzI Ahamed
 * @eMail <faaziahamed@gmail.com>
 * @Mobile +94713221220
 * Date: 09/May/2021
 * Time: 11:16 AM
 */

namespace App\Controllers;

use App\Entities\User;

class Authentication extends Controller
{

    /**
     * User Authentication
     *
     * @param $request
     * @return bool
     */
    public function login($request)
    {
        $this->validation($request, ['username' => 'required', 'password' => 'required']);

        $user = (new User($this->databaseConnection))->getByUsername($request['username']);

        if ($user && $user->password === trim($request['password'])) {
            $this->setSession($user);
            return $this->redirect([new SalesReport($this->databaseConnection), 'index']);
        }

        die('You are not authenticated');
    }

    /**
     * Persist to session store
     *
     * @param $user
     */
    public function setSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['name'] = $user->name;
        $_SESSION['username'] = $user->username;
    }
}