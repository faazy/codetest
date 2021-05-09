<?php

namespace App\Core\Contracts;

interface DatabaseConnectionInterface
{
    public function connect();

    public function query($query );
}
