<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 14.06.2016
 * Time: 13:02
 */
function record_add($data){
    global $record;
    return $record->add($data);
}
function record_get($id){
    global $record;
    return $record->get($id);
}

