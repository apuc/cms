<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 23.06.2016
 * Time: 14:44
 */

$admin->addMenuItem('Слайдер', 'slider', 'slider_func', ['admin','user'], 3, 'fa-sliders ', true, true);

function slider_func($app)
{
    prn(get_option('title'));
    slider_test();
}