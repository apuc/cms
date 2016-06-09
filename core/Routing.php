<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 13:56
 */
class Routing
{

    public function run()
    {
        $config = new Config();
        if(isset($_SERVER['REQUEST_URI'])){
            $uri = explode('/', $_SERVER['REQUEST_URI']);
            if($uri[1] == $config->routing()['admin-panel']){
                return 'admin';
            }
        }
        else {
            return 'main';
        }
    }

}