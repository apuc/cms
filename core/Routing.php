<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 13:56
 */
class Routing
{
    /**
     *
     * @return string
     */
    public function run()
    {
        $config = new Config();
        if (isset($_SERVER['REQUEST_URI'])) {
            $uri = explode('/', $_SERVER['REQUEST_URI']);
            if ($uri[1] == $config->routing()['admin-panel']) {
                return 'admin';
            }
        } else {
            return 'main';
        }
    }

    /**
     * @return string
     */
    public function get_slug()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $uri = explode('/', $_SERVER['REQUEST_URI']);
            return $uri[2];
        } else {
            return 'main';
        }
    }

}