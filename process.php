<?php
require "vendor/autoload.php";


use App\Core\MySQLConnection;

if (isset($_GET['module']) && isset($_GET['action'])) {

    $request = $_REQUEST;
    $module = $request['module'];
    $action = $request['action'];

    if ($module === 'auth') {
        $auth = new \App\Controllers\Authentication(new MySQLConnection());
        switch ($action) {
            case 'login':
                call_user_func([$auth, $action], $request);
                break;
        }
    }
//    if ($user = $auth->login($username, $password)) {
//
//        return require_once "sales_report.php";
//    }


}