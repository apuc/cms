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
    private $app;

    function __construct()
    {
        $this->slug = $this->getSlug();
        $this->core = new Core();
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
        foreach ($this->menu_items as $item) {
            if ($this->slug == $item['slug']) {
                if(isset($item['record_type'])){
                    render_admin('/admin_lte/views/record_form.php', [
                        'item' => $item,
                        'core' => $this->core,
                        'app' => $this->app,
                        'record' => $this->app->record->get_by_type($item['slug']),
                    ]);
                }
                else{
                    if($item['app']){
                        call_user_func($item['func_name'],$this->app);
                    }
                    else {
                        call_user_func($item['func_name']);
                    }
                }
            }
        }
    }

    public function getActivePage(){


    }

    /**
     * @return mixed
     */
    public function title(){
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
     * Сортирует меню
     */
    public function sortMenu(){
        $order = [];
        foreach($this->menu_items as $key => $item){
            $order[$key] = $item['order'];
        }
        array_multisort($order, SORT_NUMERIC, $this->menu_items);
    }
}