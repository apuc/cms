<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 26.05.2016
 * Time: 11:41
 */

function get_option($key)
{
    global $options;
    return $options->get($key);
}

function set_option($key, $value)
{
    global $options;
    return $options->set($key, $value);
}