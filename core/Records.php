<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 26.05.2016
 * Time: 14:55
 */
class Records
{
    public $records_types;
    private $core;

    function __construct()
    {
        $this->core = new Core();
    }

    public function add($data)
    {
        if (!empty($data)) {
            if (isset($data['title'])) {
                $insert['title'] = $data['title'];
                if (isset($data['author'])) {
                    $insert['author'] = $data['author'];
                } else {
                    $insert['author'] = 1;
                }
                if (isset($data['content'])) {
                    $insert['content'] = $data['content'];
                }
                if (isset($data['status'])) {
                    $insert['status'] = $data['status'];
                } else {
                    $insert['status'] = 'publish';
                }
                if (isset($data['comment'])) {
                    $insert['comment'] = $data['comment'];
                } else {
                    $insert['comment'] = 0;
                }
                if (isset($data['type'])) {
                    $insert['type'] = $data['type'];
                } else {
                    $insert['type'] = 'record';
                }
                $insert['slug'] = $this->genSlug($data['title']);

                if (isset($data['id'])) {
                    $insert['dt_update'] = time();
                    return $this->core->db->update($insert, $this->core->config->db()['suffix'] . 'records', ['id' => $data['id']]);
                } else {
                    $insert['dt_add'] = time();
                    $insert['dt_update'] = time();
                    return $this->core->db->insert($insert, $this->core->config->db()['suffix'] . 'records');
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function genSlug($title)
    {
        $slug = str2url($title);
        $isset = $this->core->db->_isset(['slug'=>$slug], $this->core->config->db()['suffix'] . 'records', true);
        if($isset != 0){
            $i = 1;
            while($isset != 0){
                if($i == 1){
                    $slug .= $i;
                }
                else {
                    $slug = substr($slug, 0, -1);
                    $slug .= $i;
                }
                $i++;
                $isset = $this->core->db->_isset(['slug'=>$slug], $this->core->config->db()['suffix'] . 'records', true);
            }
        }
        return $slug;
    }

    public function addRecordsType($args)
    {
        $this->records_types[] = [
            'title' => $args['title'],
            'slug' => $args['slug'],
            'icon' => $args['icon'],
        ];
    }

    public function registerRecordType()
    {
        global $admin;
        foreach($this->records_types as $item){
            $admin->addMenuRecord($item['title'], $item['slug'], $item['title'], $item['icon']);

        }
    }

    public function get($id)
    {
        return $this->core->db->getFromId($id, $this->core->config->db()['suffix'] . 'records');
    }

    public function search()
    {

    }


}