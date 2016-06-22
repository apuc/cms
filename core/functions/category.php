<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 20.06.2016
 * Time: 15:57
 */
function category_add($title, $type_category, $slug = false, $record_type = 'record', $parent_id = 0)
{
    global $category;
    return $category->add($title, $type_category, $slug, $record_type, $parent_id);
}

function print_category_tree($parent, $type)
{
    global $category;
    $category->printCategoryTree($parent, $type);
}

function category_delete($id)
{
    global $category;
    return $category->del($id);
}