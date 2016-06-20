<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 20.06.2016
 * Time: 15:57
 */
function category_add($title, $slug, $type_category, $record_type = 'record', $parent_id = 0){
    global $category;
    return $category->add($title, $slug, $type_category, $record_type, $parent_id);
}