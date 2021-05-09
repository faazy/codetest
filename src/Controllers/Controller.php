<?php

namespace App\Controllers;

use App\Core\Contracts\DatabaseConnectionInterface;

class Controller
{
    protected $databaseConnection;

    public function __construct(DatabaseConnectionInterface $databaseConnection)
    {
        $this->databaseConnection = $databaseConnection;
    }

    /**
     * @param array $request
     * @param array $rule
     */
    public function validation(array $request, array $rule)
    {
        foreach ($rule as $key => $value) {
            if (!isset($request[$key]) || ($value == 'required' && empty($request[$key]))) {
                throw new \InvalidArgumentException(sprintf('The %s field is required', ucfirst($key)));
            }
        }
    }

    public function redirect($path)
    {
        return call_user_func($path, $_REQUEST);
    }

    /**
     * @throws \Exception
     */
    public function view($file, $data)
    {
        $file_path = './views/' . $file;

        if (!file_exists($file_path)) {
            throw new \Exception(sprintf('%s view file does not exists', $file));
        }

        return require_once $file_path;
    }
}