<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 22.06.2016
 * Time: 16:15
 */
$admin->addMenuItem('Темы', 'theme', 'theme_func', ['admin'], 1, 'fa-key', true, true);

function theme_func($app)
{
    echo '123';
}