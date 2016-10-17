<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 15.10.2016
 * Time: 22:36
 */

/**
 * @param bool|string $tpl
 */
function get_header($tpl = false){
    global $options,$header;

    if($tpl){
        include (ROOT_DIR . '/public/themes/' . get_option('theme') . '/' . $tpl . '-header.php');
    }
    else {
        include (ROOT_DIR . '/public/themes/' . get_option('theme') . '/header.php');
    }
}

/**
 * @param bool|string $tpl
 */
function get_footer($tpl = false){
    global $options,$header;

    if($tpl){
        include (ROOT_DIR . '/public/themes/' . get_option('theme') . '/' . $tpl . '-footer.php');
    }
    else {
        include (ROOT_DIR . '/public/themes/' . get_option('theme') . '/footer.php');
    }
}

/**
 * Получить настройки темы
 */
function get_settings(){
    global $settings;
    return $settings->getSettings();
}

function get_sections(){
    global $settings;
    return $settings->getSections();
}

function get_default_value($name){
    global $settings;
    return $settings->getDefaultValue($name);
}

function get_theme_option($name){
    return (get_option($name)) ? get_option($name) : get_default_value($name);
}