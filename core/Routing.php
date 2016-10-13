<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 13:56
 */
class Routing
{
    /**
     *
     * @return string
     */
    public function run()
    {
        $config = new Config();

        $uri = explode('/', $_SERVER['REQUEST_URI']);
        if ($uri[1] == $config->routing()['admin-panel']) {
            return ['admin'];
        } else {
            return $this->front_routing();
        }
    }

    /**
     * @return string
     */
    public function get_slug()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $uri = explode('/', $_SERVER['REQUEST_URI']);
            return $uri[2];
        } else {
            return 'main';
        }
    }

    public function get_link()
    {

        $link_rules = get_option('link_rules');
        if (!$link_rules) {
            $link_rules = "http://" . $_SERVER['HTTP_HOST'] . "/{slug}/{id}";
        }
        $link = explode('/', $link_rules);
        $link[3];

    }

    public function front_routing()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url_value = explode('/', $url);
        if (empty($url_value[1])) {
            return ['index'];
        }
        $cat = [];
        $category = get_option('category');
        $type = get_option('type');
        if ($url_value[1] == $category) {
            $cat[] = 'category';
            $slug_cat = category_get_by_slug($url_value[2]);
            if (!empty($slug_cat)) {
                $cat[] = $url_value[2];
                return $cat;
            } else {
                return ['404'];
            }

        }
        $t = [];
        if ($url_value[1] == $type) {
            $t[] = 'type';
            $slug_type = record_get_by_type($url_value[2]);
            if (!empty($slug_type)) {
                $t[] = $url_value[2];
                return $t;
            } else {
                return ['404'];
            }

        }
        $slug_id = [];
        $link = get_option('link_rules_record');
        $link = explode('/', $link);
        $i = 1;
        $val = '';
        foreach ($link as $item) {

            if ($item == '{slug}') {
                $val = $item;
                break;
            }
            if ($item == '{id}') {
                $val = $item;
                break;
            }
            $i++;
        }

        $slug_id[] = 'record';
        if ($val == '{slug}') {
            $link_slug = record_get_by_slug($url_value[$i]);
            if ($url_value[$i] == $link_slug['slug']) {
                $slug_id[] = $link_slug['id'];
                return $slug_id;
            }
        } else {
            $link_id = record_get($url_value[$i]);
            if ($url_value[$i] == $link_id['id']) {
                $slug_id[] = $link_id['id'];
                return $slug_id;
            }
        }
        return ['404'];
    }

}