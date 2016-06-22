<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 21.06.2016
 * Time: 10:36
 */

function form_begin($options = [], $method = 'POST', $action = ''){
    global $form;
    return $form->begin($options, $method, $action);
}

function form_select($name, $selected, $data, $options = false){
    global $form;
    return $form->dropDownList($name, $selected, $data, $options);
}

function form_array_map($key, $value, $array){
    global $form;
    return $form->arrayMap($key, $value, $array);
}