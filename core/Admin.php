<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 15:00
 */
class Admin
{
    public $sub_menu_items = [];
    public $menu_items = [];
    public $hooks = [];
    public $slug;
    public $sub_slug;
    private $core;
    private $app;

    function __construct()
    {
        global $core;
        $this->core = $core;
        $this->slug = $this->getSlug();
        $this->sub_slug = $this->getSubSlug();
        $this->app = new App();
    }

    /**
     * @param string $title
     * @param string $slug
     * @param string $func_name
     * @param string $rule
     * @param string $order
     * @param string $icon
     * @param bool $show
     * @param bool $app
     */
    public function addMenuItem($title, $slug, $func_name, $rule, $order, $icon = 'fa-book', $show = true, $app = false)
    {
        $this->menu_items[] = [
            'title' => $title,
            'slug' => $slug,
            'func_name' => $func_name,
            'icon' => $icon,
            'show' => $show,
            'rule' => $rule,
            'order' => $order,
            'app' => $app,
        ];
    }

    /**
     * @param string $parent_slug
     * @param string $title
     * @param string $slug
     * @param bool $app
     */
    public function addRecordSubItem($parent_slug, $title, $slug, $app = false)
    {
        $this->sub_menu_items[$parent_slug][] = [
            'parent_slug' => $parent_slug,
            'title' => $title,
            'slug' => $slug,
            'app' => $app,
        ];
    }

    /**
     * @param string $parent_slug
     * @param string $title
     * @param string $slug
     * @param bool $app
     */
    public function addRecordSubItemCategory($parent_slug, $title, $slug, $app = false)
    {
        $this->sub_menu_items[$parent_slug][] = [
            'parent_slug' => $parent_slug,
            'title' => $title,
            'slug' => $slug,
            'app' => $app,
            'cat' => true,
        ];
    }

    /**
     * @param string $parent_slug
     * @param string $title
     * @param string $slug
     * @param string $func_name
     * @param bool $app
     */
    public function addSubMenuItem($parent_slug, $title, $slug, $func_name, $app = false)
    {
        $this->sub_menu_items[$parent_slug][] = [
            'parent_slug' => $parent_slug,
            'title' => $title,
            'slug' => $slug,
            'func_name' => $func_name,
            'app' => $app,
        ];
    }

    /**
     * @param string $title
     * @param string $slug
     * @param string $rule
     * @param string $order
     * @param string $icon
     * @param bool $show
     * @param bool $app
     */
    public function addMenuRecord($title, $slug, $rule, $order, $icon = 'fa-book', $show = true, $app = false)
    {
        $this->menu_items[] = [
            'title' => $title,
            'slug' => $slug,
            'icon' => $icon,
            'rule' => $rule,
            'order' => $order,
            'record_type' => 'record',
            'show' => $show,
            'app' => $app,
        ];
    }

    /**
     * @return array
     */
    public function getMenuItems()
    {
        return $this->menu_items;
    }

    /**
     * @return string
     */
    public function getSkinDir()
    {
        return '/core/admin/skins';
    }

    /**
     *
     */
    public function content()
    {
        global $category;
        foreach ($this->menu_items as $item) {
            if (isset($item['child'])) {
                if (isset($item['record_type'])) {
                    if ($this->sub_slug == 'all' and $this->slug == $item['slug']) {
                        render_admin('/admin_lte/views/record_form.php', [
                            'item' => $item,
                            'core' => $this->core,
                            'app' => $this->app,
                            'record' => $this->app->record->get_by_type($item['slug']),
                        ]);
                    }
                    if ($this->sub_slug == 'add' and $this->slug == $item['slug']) {
                        render_admin('/admin_lte/views/add_record.php', [
                            'type' => $item['slug'],
                            'category' => $category->category_group,
                        ]);
                    }
                    if ($this->sub_slug == 'edit' and $this->slug == $item['slug']) {
                        render_admin('/admin_lte/views/edit_record.php', [
                            'type' => $item['slug'],
                            'category' => $category->category_group,
                            'record' => record_get($_GET['id']),
                            'this_category' => record_get_category($_GET['id']),
                        ]);
                    }
                    foreach ($item['child'] as $child) {
                        if (isset($child['cat']) and $this->sub_slug == $child['slug']) {
                            render_admin('/admin_lte/views/category.php', [
                                'core' => $this->core,
                                'app' => $this->app,
                                'record_type' => $this->slug,
                                'type_category' => $this->sub_slug,
                                'category' => $this->app->category->getByType($this->sub_slug),
                            ]);
                        }
                    }
                } else {
                    foreach ($item['child'] as $child) {
                        if ($child['slug'] == $this->sub_slug) {
                            if ($child['app']) {
                                call_user_func($child['func_name'], $this->app);
                            } else {
                                call_user_func($child['func_name']);
                            }
                        }
                    }
                }
            } else {
                if ($this->slug == $item['slug']) {
                    if (isset($item['record_type'])) {
                        if ($this->sub_slug == 'all') {
                            render_admin('/admin_lte/views/record_form.php', [
                                'item' => $item,
                                'core' => $this->core,
                                'app' => $this->app,
                                'record' => $this->app->record->get_by_type($item['slug']),
                            ]);
                        }
                        if ($this->sub_slug == 'add') {
                            render_admin('/admin_lte/views/add_record.php', [
                                'type' => $item['slug'],
                            ]);
                        }
                        if ($this->sub_slug == 'edit' and $this->slug == $item['slug']) {
                            render_admin('/admin_lte/views/edit_record.php', [
                                'type' => $item['slug'],
                                'category' => $category->category_group,
                                'record' => record_get($_GET['id']),
                            ]);
                        }
                    } else {
                        if ($item['app']) {
                            call_user_func($item['func_name'], $this->app);
                        } else {
                            call_user_func($item['func_name']);
                        }
                    }
                }
            }
        }
    }

    public function getActivePage()
    {

    }

    /**
     * @return mixed
     */
    public function title()
    {
        foreach ($this->menu_items as $item) {
            if ($this->slug == $item['slug']) {
                return $item['title'];
            }
        }
    }

    /**
     * Получает название слага
     * @return mixed
     */
    public function getSlug()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        return $uri[2];
    }

    /**
     * @return mixed
     */
    public function getSubSlug()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        return $uri[3];
    }

    /**
     * Сортирует меню
     */
    public function sortMenu()
    {
        $order = [];

        foreach ($this->menu_items as $key => $item) {
            $order[$key] = $item['order'];
        }

        array_multisort($order, SORT_NUMERIC, $this->menu_items);

        $i = 0;
        foreach ($this->menu_items as $key => $item) {
            if (isset($this->sub_menu_items[$item['slug']])) {
                foreach ($this->sub_menu_items[$item['slug']] as $sub_item) {
                    $this->menu_items[$i]['child'][] = $sub_item;
                }
            }
            $i++;
        }
    }
}