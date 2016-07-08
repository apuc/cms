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
$admin->addSubMenuItem('test2', 'Тестовое подменю', 'test2_1', 'test_func2_1');
$admin->addSubMenuItem('test2', 'Тестовое подменю2', 'test2_2', 'test_func2_2');
//user_login('wwww@mail.ru', '123321');
function test_func2_1()
{
    echo '2_1';
    //prn(category_get_by_slug('glavnaya'));
  //  prn(category_get_by_id(8));
   // prn(category_get_by_record_type('feedback'));
   // prn(category_get_by_type_category('type_feedback'));
   // prn(record_get_category(82));
    smart_mail('qqqqq@nbvb.jh','wwwww@fdfd.fd', 'fghjcvbnyu', 'mnbfds gtrsg fgh');
}
function test_func2_2()
{
    prn(category_add('Видео', 'video', 'type_feedback', '', 'feedback'));
}
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
    //user_set_pass(5,11111);




}

$record->addRecordsType(['title' => 'Отзывы', 'type' => 'feedback', 'icon' => 'fa-bell', 'order' => 5]);
$category->addCategoryTypeGroup('Вид отзыва', 'type_feedback', 'feedback');
$category->addCategoryTypeGroup('Длинна отзыва', 'size_feedback', 'feedback');
$record_hook->addCustomField('author','feedback', 'feedback_custom', true);
$record_hook->addToSave('author','feedback', 'save_custom', true);

function feedback_custom($app)
{
    render('/views/author_input.php',[]);


}

function save_custom($app)
{

}
