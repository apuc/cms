<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 15:10
 */

$admin->addMenuItem('test', 'tets', 'Тест', 'test_func');

function test_func(){
    echo "админ привет";
}

$admin->addMenuItem('test2', 'test2', 'Тест2', 'test_func2', 'fa-bell');

function test_func2(){
    echo "админ привет2";
}