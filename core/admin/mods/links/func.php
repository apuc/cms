<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 05.07.2016
 * Time: 14:36
 */
$admin->addMenuItem('Ссылки', 'links', 'links_func',['admin'], 1, 'fa-link', true, true);

function links_func()
{


    if(isset($_POST['link_rules_record'])){
        foreach($_POST as $k => $post){
            set_option($k, $post);
        }
        render_admin('/admin_lte/views/alert_success.php', [
            'title' => 'Настрйки сохранены',
            'msg' => 'Удачное сохранение'
        ]);
    }

    $link_rules_record = get_option('link_rules_record');
    $link_rules_category = get_option('link_rules_category');
    $link_rules_type = get_option('link_rules_type');
    $category = get_option('category');
    $type = get_option('type');


    if(!$link_rules_record) {
        $link_rules_record = "{slug}/{id}";
    }
    if(!$link_rules_category) {
        $link_rules_category = "{category_slug}";
    }
    if(!$link_rules_type) {
        $link_rules_type = "{type_slug}";
    }
    if(!$category) {
        $category = 'category';
    }
    if(!$type) {
        $type = 'type';
    }

    render_admin('/admin_lte/views/add_links.php', [
        'link_rules_record' =>  $link_rules_record,
        'link_rules_category' =>  $link_rules_category,
        'link_rules_type' =>  $link_rules_type,
        'category' =>  $category,
        'type' =>  $type,

    ]);
}