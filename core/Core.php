<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 11:32
 */
class Core
{

    public $db;
    public $parser;
    public $config;

    function __construct()
    {
        $this->db = new Db();
        $this->parser = new Parser();
        $this->config = new Config();
    }

}