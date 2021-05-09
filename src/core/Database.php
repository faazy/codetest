<?php

namespace App\Core;

use App\Core\Contracts\DatabaseConnectionInterface;

abstract class Database
{

    private $connection;

    private static $instance;

    /**
     * Database constructor.
     * @param DatabaseConnectionInterface $connection
     */
    public function __construct(DatabaseConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     *
     * @return Database
     */
    private static function getInstance()
    {
        if (self::$instance == null) {
            $className = __CLASS__;
            self::$instance = new $className;
        }

        return self::$instance;
    }


    /**
     * Run Query Statements with biding
     *
     * @param $query
     * @param array $binding
     * @return string
     */
    public function query($query, array $binding = [], $isLazy = false)
    {
        try {
            if (!empty($binding)) {
                $query = $this->connection->connect()->prepare($query);
                $query->execute($binding);
            } else {
                $query = $this->connection->connect()->query($query);
            }

            //Used generators To reduce memory consumption
            if ($isLazy) {
                while ($row = $query->fetch(\PDO::FETCH_OBJ)) {
                    yield $row;
                }
            }

        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            exit;
        }
    }

    public function find()
    {

    }
}
