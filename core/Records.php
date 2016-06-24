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
    public $custom_field;

    function __construct()
    {
        global $core;
        $this->core = $core;
    }

    /**
     * Добовление новой записи
     * @param array $data
     * @return array|bool|int|string
     */
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
                if (isset($data['photo'])) {
                    $insert['photo'] = $data['photo'];
                }

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

    /**
     * Получить слаг по названию
     * @param string $title
     * @return mixed|string
     */
    public function genSlug($title)
    {
        $slug = str2url($title);
        $isset = $this->core->db->_isset(['slug' => $slug], $this->core->config->db()['suffix'] . 'records', true);
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
                $isset = $this->core->db->_isset(['slug' => $slug], $this->core->config->db()['suffix'] . 'records', true);
            }
        }
        return $slug;
    }

    /**
     * Добавить тип записи
     * @param array $args
     */
    public function addRecordsType($args)
    {
        $this->records_types[] = [
            'title' => $args['title'],
            'type' => $args['type'],
            'icon' => $args['icon'],
            'rule' => (isset($args['rule'])) ? $args['rule'] : ['admin'],
            'order' => (isset($args['order'])) ? $args['order'] : 5,
        ];
    }


    /**
     * Регистрирует тип поста
     */
    public function registerRecordType()
    {
        global $admin;
        if(!empty($this->records_types)){
            foreach ($this->records_types as $item) {
                $admin->addMenuRecord($item['title'], $item['type'], $item['rule'], $item['order'], $item['icon']);
                $admin->addRecordSubItem($item['type'], 'Все', 'all', true);
                $admin->addRecordSubItem($item['type'], 'Добавить', 'add', true);
            }
        }
    }

    /**
     * ПОлучить запись по id
     * @param int $id
     * @return bool
     */
    public function get($id)
    {
        return $this->core->db->getFromId($id, $this->core->config->db()['suffix'] . 'records');
    }

    public function search()
    {

    }

    /**
     * Получить слаг
     * @param string $slug
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->core->db->getByField('slug', $slug, $this->core->config->db()['suffix'] . 'records')[0];
    }

    /**
     * Обновить
     * @param int $id
     * @param array $data
     * @return array|bool
     */
    public function update($id, $data)
    {
        return $this->core->db->update($data, $this->core->config->db()['suffix'] . 'records', ['id' => $id]);

    }

    /**
     * @param array $data
     * @return array|bool|int|string
     */
    public function set($data)
    {
        if (isset($data['id'])) {
            if ($this->core->db->_isset(['id' => $data['id']], $this->core->config->db()['suffix'] . 'records', true)) {
                $res = $this->core->db->update($data, $this->core->config->db()['suffix'] . 'records', ['id' => $data['id']]);
            } else {
                $res = $this->core->db->insert($data, $this->core->config->db()['suffix'] . 'records');
            }
        } else {
            $res = $this->core->db->insert($data, $this->core->config->db()['suffix'] . 'records');
        }
        return $res;
    }

    /**
     * Получить запись по типу
     * @param $record_type
     * @return array|bool
     */
    public function get_by_type($record_type)
    {
        return $this->core->db->getByField('type', $record_type, $this->core->config->db()['suffix'] . 'records');
    }

    /**
     * @param int $id
     * @return array
     */
    public function getCategory($id)
    {
        $c = [];
        $category = $this->core->db->getByField('record_id', $id, db_table('category_relationship'));
        foreach ($category as $cat) {
          $c[] = $cat['category_id'];
        }
        return $c;
    }


}