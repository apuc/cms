<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 12:40
 */
class Options
{
    private $core;

    function __construct()
    {
        global $core;
        $this->core = $core;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function get($key)
    {
        if (!empty($key)) {
            $val = $this->core->db->getByField('option_key', $key, $this->core->config->db()['suffix'] . 'options',true);
            return $val[0]['option_value'];
        } else {
            return false;
        }
    }

    /**
     * @param string $key
     * @param string $value
     * @return array|bool|int|string
     */
    public function set($key, $value)
    {
        if (!empty($key)) {
            $isset = $this->core->db->_isset(['option_key' => $key], $this->core->config->db()['suffix'] . 'options',true);
            if($isset == 0){
                return $this->core->db->insert(['option_key' => $key, 'option_value' => $value], $this->core->config->db()['suffix'] . 'options');
            }
            else {
                return $this->core->db->update(['option_value' => $value], $this->core->config->db()['suffix'] . 'options', ['option_key' => $key],true);
            }
        }
        else {
            return false;
        }
    }



}