<?php

/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 15.06.2016
 * Time: 10:56
 */
class RecordMeta
{
    public $record_meta;
    private $core;

    function __construct()
    {
        global $core;
        $this->core = $core;
    }

    /**
     * Добавить новую запись
     * @param int $record_id
     * @param int $meta_key
     * @param string $meta_value
     * @return array|bool|int|string
     */
    public function add($record_id, $meta_key, $meta_value)
    {
        if ($this->core->db->_isset(['record_id' => $record_id, 'meta_key' => $meta_key], $this->core->config->db()['suffix'] . 'recordmeta') > 0) {
            return $this->core->db->update(['meta_value' => $meta_value], $this->core->config->db()['suffix'] . 'recordmeta', ['record_id' => $record_id, 'meta_key' => $meta_key]);
        } else {
            return $this->core->db->insert([
                'meta_value' => $meta_value,
                'meta_key' => $meta_key,
                'record_id' => $record_id,
            ], $this->core->config->db()['suffix'] . 'recordmeta');
        }
    }

    /**
     * Получит запись по ключу и id
     * @param int $record_id
     * @param int $meta_key
     * @return mixed
     */
    public function get($record_id, $meta_key)
    {
        return $this->core->db->getWhere(['record_id' => $record_id, 'meta_key' => $meta_key], $this->core->config->db()['suffix'] . 'recordmeta')[0]['meta_value'];
    }

    /**
     * @param int $record_id
     * @return array|bool
     */
    public function all_meta($record_id)
    {
        return $this->core->db->getWhere(['record_id' => $record_id], $this->core->config->db()['suffix'] . 'recordmeta');
    }

    /**
     *
     * @param int $record_id
     * @param int $meta_key
     * @param string $meta_value
     * @return array|bool|int|string
     */
    public function set($record_id, $meta_key, $meta_value)
    {
        if ($this->core->db->_isset(['record_id' => $record_id, 'meta_key' => $meta_key], $this->core->config->db()['suffix'] . 'recordmeta', true)) {
            $res = $this->core->db->update(['meta_value' => $meta_value], $this->core->config->db()['suffix'] . 'recordmeta', ['record_id' => $record_id, 'meta_key' => $meta_key]);
        } else {
            $res = $this->core->db->insert(['record_id' => $record_id, 'meta_key' => $meta_key, 'meta_value' => $meta_value], $this->core->config->db()['suffix'] . 'recordmeta');
        }
        return $res;
    }
}