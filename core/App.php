<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 15.06.2016
 * Time: 11:14
 */
class App
{

    public $core;
    public $record;
    public $user;
    public $option;

    function __construct()
    {
        $this->core = new Core();
        $this->record = new Records();
        $this->user = new User();
        $this->option = new Options();
    }
}