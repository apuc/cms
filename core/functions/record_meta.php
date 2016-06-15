<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 15.06.2016
 * Time: 10:57
 */
function record_meta_add($record_id, $meta_key, $meta_value){
    global $record_meta;
    return $record_meta->add($record_id, $meta_key, $meta_value);
}
function record_meta_get($record_id, $meta_key){
    global $record_meta;
    return $record_meta->get($record_id, $meta_key);
}
function record_meta_all_meta($record_id){
    global $record_meta;
    return $record_meta->all_meta($record_id);
}
function record_meta_set($record_id, $meta_key, $meta_value){
    global $record_meta;
    return $record_meta->set($record_id, $meta_key, $meta_value);
}