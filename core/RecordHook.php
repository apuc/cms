<?php

/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 22.06.2016
 * Time: 15:32
 */
class RecordHook
{

    private $core;
    public $custom_field;
    private $app;
    public $save_custom;

    function __construct()
    {
        $this->core = new Core();
        $this->app = new App();
    }
    public function addCustomField($name, $record_type, $func_name, $app = false)
    {
        $this->custom_field[] = [
            'func_name' => $func_name,
            'record_type' => $record_type,
            'app' => $app,
            'name' => $name,
        ];

    }

    public function getCustomField($type)
    {
        foreach($this->custom_field as $custom){
            if($type == $custom['record_type']){
                if ($custom['app']) {
                    call_user_func($custom['func_name'], $this->app);
                } else {
                    call_user_func($custom['func_name']);
                }
            }
        }
    }

    public function addToSave($name, $record_type, $func_name, $app = false)
    {
        $this->save_custom[] = [
            'func_name' => $func_name,
            'record_type' => $record_type,
            'app' => $app,
            'name' => $name,
        ];
    }

    public function saveCustomField($record_type)
    {
        foreach($this->save_custom as $record){
            if($record_type == $record['record_type']){
                if ($record['app']) {
                    call_user_func($record['func_name'], $this->app);
                } else {
                    call_user_func($record['func_name']);
                }
            }
        }
    }
}