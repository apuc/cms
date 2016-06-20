<?php

class Cookie
{
    public $cookie_list = [];

    /**
     * @param string $name
     * @param string $value
     * @param bool $time
     * @return bool
     */
    public function set($name, $value, $time = false)
    {
        $time = ($time) ? $time : 3600;
        return setcookie($name, $value, time() + $time, "/", $_SERVER['HTTP_HOST']);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function get($name)
    {
        if (isset($_COOKIE[$name])) {
            return $_COOKIE[$name];
        } else {
            return false;
        }
    }

    /**
     * @param string $name
     * @param string $value
     * @param bool $time
     * @return array
     */
    public function add($name, $value, $time = false)
    {
        $this->cookie_list[] = [
            'name' => $name,
            'value' => $value,
            'time' => $time,
        ];
        return $this->cookie_list;
    }

    /**
     *
     */
    public function set_all_cookie()
    {
        foreach ($this->cookie_list as $cookie) {
            $this->set($cookie['name'], $cookie['value'], $cookie['time']);
        }
    }

    /**
     * @param $handler
     */
    public function hook($handler)
    {
        call_user_func($handler);
    }
}