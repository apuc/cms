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

function form_end(){
    global $form;
    return $form->end();
}

function form_input($type, $name, $value = '', $options = false){
    global $form;
    return $form->input($type, $name, $value, $options);
}

function form_inputHidden($name, $value = '', $options = false){
    global $form;
    return $form->inputHidden($name, $value, $options);
}

function form_checkboxList($name, $value = false, $data, $options = false){
    global $form;
    return $form->checkboxList($name, $value, $data, $options);
}

function form_radiobuttonsList($name, $value = false, $data, $options = false){
    global $form;
    return $form->radiobuttonsList($name, $value, $data, $options);
}

function form_textarea($name, $value = '', $options = false){
    global $form;
    return $form->textarea($name, $value, $options);
}

function form_label($value, $for, $options = false){
    global $form;
    return $form->label($value, $for, $options);
}

function form_createForm($data){
    global $form;
    return $form->createForm($data);
}
