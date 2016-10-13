<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 21.06.2016
 * Time: 13:46
 */
class Ajax
{
    public $events;
    public $app;

    function __construct()
    {
        $this->app = new App();
    }

    /**
     * @param string $action
     * @param string $func_name
     * @param bool $app
     */
    public function add($action, $func_name, $app = false)
    {
        $this->events[] = [
            'action' => $action,
            'func_name' => $func_name,
            'app' => $app
        ];
    }

    /**
     * @param string $action
     */
    public function perform($action){
        foreach($this->events as $event){
            if($event['action'] == $action){
                if ($event['app']) {
                    call_user_func($event['func_name'], $this->app);
                } else {
                    call_user_func($event['func_name']);
                }
            }
        }
    }
}