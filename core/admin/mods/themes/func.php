<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 22.06.2016
 * Time: 16:15
 */
$admin->addMenuItem('Темы', 'theme', 'theme_func', ['admin'], 1, 'fa-picture-o', true, true);

function theme_func($app)
{
    echo '123';
    $array_paths = array(
        '/public/themes/',
    );
    foreach ($array_paths as $path){
        $path = 'theme.info';
        if (is_file($path)){
            include_once $path;
        }
    }
}