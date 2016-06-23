<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 23.06.2016
 * Time: 14:44
 */

$admin->addMenuItem('Дублировать', 'duplicate', 'duplicate_func', ['admin'], 3, 'fa-clipboard', true, true);

function duplicate_func($app)
{
    prn(123);
    duplicate_test();
}