<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 10.06.2016
 * Time: 12:27
 */
function config_db(){
    global $core;
    return $core->config->db();
}
function config_routing($key){
    global $core;
    return $core->config->routing()[$key];
}
function config_user($key){
    global $core;
    return $core->config->user()[$key];
}