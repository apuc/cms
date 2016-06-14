<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 15:10
 */

$admin->addMenuItem('test', 'tets', 'Тест', 'test_func');

function test_func(){
    global $options;
    echo $options->get('title');
}

$admin->addMenuItem('test3', 'test2', 'Тест2', 'test_func2', 'fa-bell');
//user_login('wwww@mail.ru', '123321');
function test_func2(){
    //user_login('wwww@mail.ru', '123321');
   // add_user_meta(5, 'ghfgdghh', '5577oohjko');
    //prn(get_user_meta(5, 'ghfgdghh'));
   // prn(all_meta(5));
    prn(record_get(39));

}

$record->addRecordsType(['title'=> 'Отзывы', 'slug' => 'feedback', 'icon' => 'fa-bell']);

/*$cookie->hook('my_login');

function my_login(){
    user_login('wwww@mail.ru', '123321');
}*/
