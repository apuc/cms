<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 15:10
 */

$admin->addMenuItem('test', 'tets', 'test_func', ['admin', 'user'], 6);

function test_func()
{
    global $options;
    echo $options->get('title');
}

$admin->addMenuItem('test3', 'test2', 'test_func2',['admin'], 6, 'fa-bell', true, true);
//user_login('wwww@mail.ru', '123321');
function test_func2($app)
{
    //user_login('wwww@mail.ru', '123321');
    // add_user_meta(5, 'ghfgdghh', '5577oohjko');
    //prn(get_user_meta(5, 'ghfgdghh'));
    // prn(all_meta(5));
    //  prn(record_getBySlug('privet2'));
    // prn(record_update('40', ['author' => 2]));
    //prn(record_meta_add(1, '3215', '000gy'));
    //prn(record_meta_all_meta(1));
   // prn(user_get_all());
   prn(123);

}

$record->addRecordsType(['title' => 'Отзывы', 'slug' => 'feedback', 'icon' => 'fa-bell', 'order' => 5]);

/*$cookie->hook('my_login');

function my_login(){
    user_login('wwww@mail.ru', '123321');
}*/
