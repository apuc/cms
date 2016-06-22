<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 21.06.2016
 * Time: 10:54
 */

function admin_url($slug)
{
    global $url;
    return $url->admin_url($slug);
}