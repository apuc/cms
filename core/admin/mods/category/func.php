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
    prn($_POST);
    if(isset($_POST['title'])){
        $parent = ($_POST['parent'] == '-') ? 0 : $_POST['parent'];
        category_add($_POST['title'], $_POST['slug'],$_POST['type_category'], $_POST['record_type'], $parent);
    }
}

$ajax->add('add_category', 'ajax_add_category');

function ajax_add_category(){
    if(isset($_POST['title'])){
        $parent = ($_POST['parent'] == '-') ? 0 : $_POST['parent'];
        $slug = (!empty($_POST['slug'])) ? $_POST['slug'] : false;
        category_add($_POST['title'] ,$_POST['type_category'], $slug, $_POST['record_type'], $parent);
        print_category_tree(0, $_POST['type_category']);
    }
}

$ajax->add('del_cat', 'ajax_del_category');

function ajax_del_category(){
    category_delete($_POST['id']);
}