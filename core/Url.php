<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 21.06.2016
 * Time: 10:43
 */
class Url
{

    private $core;

    function __construct()
    {
        global $core;
        $this->core = $core;
    }

    /**
     * @param string $slug
     * @return string
     */
    public function admin_url($slug){
        return "/" . $this->core->config->routing()['admin-panel'] . "/" . $slug;
    }

}