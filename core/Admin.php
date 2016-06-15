<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 15:00
 */
class Admin
{

    public $menu_items = [];
    public $hooks = [];
    public $slug;
    private $core;

    function __construct()
    {
        $this->slug = $this->getSlug();
        $this->core = new Core();
    }

    public function addMenuItem($title, $slug, $name, $func_name, $icon = 'fa-book', $show = true)
    {
        $this->menu_items[] = [
            'title' => $title,
            'slug' => $slug,
            'name' => $name,
            'func_name' => $func_name,
            'icon' => $icon,
            'show' => $show
        ];
    }

    public function addMenuRecord($title, $slug, $name, $icon = 'fa-book', $show = true)
    {
        $this->menu_items[] = [
            'title' => $title,
            'slug' => $slug,
            'name' => $name,
            'icon' => $icon,
            'record_type' => 'record',
            'show' => $show
        ];
    }

    public function getMenuItems()
    {
        return $this->menu_items;
    }

    public function getSkinDir()
    {
        return '/core/admin/skins';
    }

    public function content()
    {
        foreach ($this->menu_items as $item) {
            if ($this->slug == $item['slug']) {
                if(isset($item['record_type'])){
                    render_admin('/admin_lte/views/record_form.php', ['item' => $item, 'core' => $this->core]);
                }
                else{
                    call_user_func($item['func_name']);
                }
            }
        }
    }

    public function getActivePage(){


    }

    public function title(){
        foreach ($this->menu_items as $item) {
            if ($this->slug == $item['slug']) {
                return $item['title'];
            }
        }
    }

    public function getSlug()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        return $uri[2];
    }
}