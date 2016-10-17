<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 14.10.2016
 * Time: 23:00
 */
class Stat
{

    public $info;

    public function add($type, $data){
        $this->info[$type] = $data;
    }

}