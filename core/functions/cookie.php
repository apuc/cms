<?php
function cookie_set($name, $value, $time = false){
    global $cookie;
    return $cookie->add($name, $value, $time);
}
function cookie_get($name){
    global $cookie;
    return $cookie->get($name);
}