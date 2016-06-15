<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 16:09
 */
class AdminConfig
{

    public function get()
    {
        return [
            'mods' => [
                'options',
                'register',
                'auth',
                'record'
            ]
        ];
    }

}