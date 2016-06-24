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
    public $record_meta;
    public $url;
    public $forms;
    public $category;

    function __construct()
    {
        global $core;
        $this->core = $core;
        $this->record = new Records();
        $this->user = new User();
        $this->option = new Options();
        $this->record_meta = new RecordMeta();
        $this->forms = new Forms();
        $this->url = new Url();
        $this->category = new Category();
    }
}