<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 12:04
 */
class Config
{

    public function db()
    {
        return [
            'host' => 'localhost',
            'user' => 'root',
            'pass' => 'mysql',
            'db' => 'cms',
            'port' => NULL,
            'socket' => NULL,
            'pconnect' => FALSE,
            'charset' => 'utf8',
            'suffix' => 'k_',
        ];
    }

    public function routing(){
        return [
            'admin-panel' => 'k-admin',
        ];
    }

}