<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 20.06.2016
 * Time: 16:08
 */
$admin->addMenuItem('Добавить категорию', 'add_category', 'admin_add_category', ['admin'], 1, '', false, true);

function admin_add_category($app)
{
    if(isset($_POST['submit'])){
        category_add($_POST['title'], $_POST['slug'],$_POST['type_category'], $_POST['record_type']);
    }
}