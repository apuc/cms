<?php

/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 20.06.2016
 * Time: 12:33
 */
class Category
{
    public $category_group;
    private $core;

    function __construct()
    {
        $this->core = new Core();
    }

    public function addCategoryTypeGroup($title, $slug, $record_type)
    {
        $this->category_group[] = [
            'title' => $title,
            'slug' => $slug,
            'record_type' => $record_type,
        ];
    }

    public function registerCategory()
    {
        global $admin;
        foreach ($this->category_group as $group) {
            $admin->addRecordSubItemCategory($group['record_type'], $group['title'], $group['slug'], true);
        }
    }

    public function add($title, $slug, $type_category, $record_type = 'record', $parent_id = 0)
    {
        return $this->core->db->insert([
            'title' => $title,
            'slug' => $slug,
            'type_category' => $type_category,
            'dt_add' => time(),
            'record_type' => $record_type,
            'parent_id' => $parent_id],
            db_table("category"));
    }
}