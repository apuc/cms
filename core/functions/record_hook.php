<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 22.06.2016
 * Time: 15:36
 */
function record_get_custom_field($type)
{
    global $record_hook;
    $record_hook->getCustomField($type);
}