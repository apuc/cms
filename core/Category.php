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
        if(!empty($this->category_group)){
            foreach ($this->category_group as $group) {
                $admin->addRecordSubItemCategory($group['record_type'], $group['title'], $group['slug'], true);
            }
        }
    }

    public function add($title, $type_category, $slug = false, $record_type = 'record', $parent_id = 0)
    {
        return $this->core->db->insert([
            'title' => $title,
            'slug' => ($slug) ? $this->genSlug($slug) : $this->genSlug(str2url($title)),
            'type_category' => $type_category,
            'dt_add' => time(),
            'record_type' => $record_type,
            'parent_id' => $parent_id],
            db_table("category"));
    }

    public function genSlug($slug)
    {
        $isset = $this->core->db->_isset(['slug' => $slug], db_table('category'), true);
        if ($isset != 0) {
            $i = 1;
            while ($isset != 0) {
                if ($i == 1) {
                    $slug .= $i;
                } else {
                    $slug = substr($slug, 0, -1);
                    $slug .= $i;
                }
                $i++;
                $isset = $this->core->db->_isset(['slug' => $slug], db_table('category'), true);
            }
        }
        return $slug;
    }

    public function getByType($type)
    {
        return $this->core->db->getByField('type_category', $type, db_table('category'));
    }

    public function getByParentId($id, $type)
    {
        return $this->core->db->getWhere([
            'parent_id' => $id,
            'type_category' => $type,
        ], db_table('category'));
    }

    public function del($id)
    {
        return $this->core->db->queryDeleteByField(db_table('category'), 'id', $id);
    }

    public function printCategoryTree($parent, $type)
    {
        $cat = $this->getByParentId($parent, $type);
        echo "<ul class='categ_tab'>";
        foreach ($cat as $c) {
            echo "<li>";
            echo $c['title'];
            echo '<a href="#" data-id="' . $c['id'] . '" class="del_cat"><i class="fa fa-trash" style="color: red" aria-hidden="true"></i></a>';
            $this->printCategoryTree($c['id'], $type);
            echo "</li>";
        }
        echo "</ul>";
    }

    public function printCategoryCheckbox($parent, $type, $checked = [])
    {
        $check = $this->getByParentId($parent, $type);
        echo "<ul>";
        foreach ($check as $ch) {
            $check_cat = (in_array($ch['id'], $checked)) ? 'checked' : '';
            echo "<li><input type='checkbox' $check_cat class='reviews_cats-check' value='" . $ch['id'] . "' >";
            echo $ch['title'];
            $this->printCategoryCheckbox($ch['id'], $type, $checked);
            echo "</li>";
        }
        echo "</ul>";
    }

    public function getBySlug($slug)
    {
        return $this->core->db->getByField('slug', $slug, db_table('category'))[0];
    }

    public function getById($id)
    {
        return $this->core->db->getByField('id', $id, db_table('category'))[0];
    }

    public function getByRecordType($record_type)
    {
        return $this->core->db->getByField('record_type', $record_type, db_table('category'));
    }

    public function getByTypeCategory($type_category)
    {
        return $this->core->db->getByField('type_category', $type_category, db_table('category'));
    }
}