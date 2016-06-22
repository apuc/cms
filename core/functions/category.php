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

function category_print_category_checkbox($parent, $type, $checked = [])
{
    global $category;
    $category->printCategoryCheckbox($parent, $type, $checked);
}

function category_get_by_slug($slug)
{
    global $category;
    return $category->getBySlug($slug);
}

function category_get_by_id($id)
{
    global $category;
    return $category->getById($id);
}

function category_get_by_record_type($record_type)
{
    global $category;
    return $category->getByRecordType($record_type);
}

function category_get_by_type_category($type_category)
{
    global $category;
    return $category->getByTypeCategory($type_category);
}