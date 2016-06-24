<?php

/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 09.06.2016
 * Time: 12:22
 */
class User
{
    private $core;
    public $current_user;


    function __construct()
    {
        global $core;
        $this->core = $core;
        $id = cookie_get('id');
        if ($id) {
            $this->current_user = $this->get_current();
        } else {
            $this->current_user = false;
        }
    }

    /**
     * @param array $args
     * @return array|bool|int|string
     */
    public function add($args)
    {

        if (!isset($args['login']) || empty($args['login'])) {
            return ['error_code' => 1, 'error_msg' => 'Некорректный логин', 'action' => 'error'];
        }
        if ($this->core->db->_isset(['login' => $args['login']], $this->core->config->db()['suffix'] . 'user')) {
            return ['error_code' => 2, 'error_msg' => 'Такой логин существует', 'action' => 'error'];

        }
        if (!isset($args['email']) or empty($args['email'])) {
            return ['error_code' => 3, 'error_msg' => 'Некорректный email', 'action' => 'error'];
        }
        if ($this->core->db->_isset(['email' => $args['email']], $this->core->config->db()['suffix'] . 'user')) {
            return ['error_code' => 4, 'error_msg' => 'Такой email существует', 'action' => 'error'];
        }
        if (!isset($args['pass']) or empty($args['pass'])) {
            return ['error_code' => 5, 'error_msg' => 'Некорректный пароль', 'action' => 'error'];
        }

        $data['login'] = $args['login'];
        $data['email'] = $args['email'];
        $data['pass'] = md5(md5(trim($args['pass'])));

        $data['name'] = (isset($args['meta']['name'])) ? $args['meta']['name'] : '';
        $data['last_name'] = (isset($args['meta']['last_name'])) ? $args['meta']['last_name'] : '';
        $data['dt_add'] = (isset($args['meta']['dt_add'])) ? $args['meta']['dt_add'] : time();
        $data['dt_update'] = (isset($args['meta']['dt_update'])) ? $args['meta']['dt_update'] : time();
        $data['hash_keys'] = md5($this->generateCode());
        $data['user_ip'] = $this->getRealIpAddr();

        $id = $this->core->db->insert($data, $this->core->config->db()['suffix'] . 'user');
        $rule = $this->core->db->getByField('name', config_user('rule'), $this->core->config->db()['suffix'] . 'rule')[0]['id'];
        $this->core->db->insert(['rule_id' => $rule, 'user_id' => $id], $this->core->config->db()['suffix'] . 'assignment');
        foreach ($args['meta'] as $k => $meta) {
            if ($k != 'name' and $k != 'last_name') {
                $this->core->db->insert([
                    'user_id' => $id,
                    'meta_key' => $k,
                    'meta_value' => $meta,
                ], $this->core->config->db()['suffix'] . 'usermeta');
            }
        }
        return $id;
    }

    /**
     * @param int $length
     * @return string
     */
    public function generateCode($length = 6)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0, $clen)];
        }
        return $code;
    }

    /**
     * @return mixed
     */
    public function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function get_by_id($id)
    {
        return $this->core->db->getFromId($id, $this->core->config->db()['suffix'] . 'user');
    }

    /**
     * @param $login
     * @param $pass
     * @return array
     */
    public function get($login, $pass)
    {

        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\\._-]+)+$/", $login)) {
            $user = $this->core->db->getByField('login', $login, $this->core->config->db()['suffix'] . 'user');

        } else {
            $user = $this->core->db->getByField('email', $login, $this->core->config->db()['suffix'] . 'user');
        }
        if ($user) {
            if ($user[0]['pass'] == md5(md5($pass))) {
                return $user[0];
            } else {
                return ['error_code' => 7, 'error_msg' => 'Неверный пароль', 'action' => 'error'];
            }
        } else {
            return ['error_code' => 6, 'error_msg' => 'Пользователь не найден', 'action' => 'error'];
        }

    }

    /**
     * @param string $login
     * @param string $pass
     * @return array|bool
     */
    public function login($login, $pass)
    {
        $user = $this->get($login, $pass);
        if (isset($user['action'])) {
            return $user;
        } else {
            $code = md5($this->generateCode());
            $ip = $this->getRealIpAddr();
            $this->core->db->update([
                'user_hash' => $code,
                'user_ip' => $ip,
            ], $this->core->config->db()['suffix'] . 'user', ['id' => $user['id']]);
            cookie_set('id', $user['id']);
            cookie_set('user_hash', $code);
            cookie_set('ip', $ip);
            return true;
        }
    }

    /**
     * @param int $user_id
     * @param $meta_key
     * @param string $meta_value
     * @return array|bool|int|string
     */
    public function add_user_meta($user_id, $meta_key, $meta_value)
    {
        if ($this->core->db->_isset(['user_id' => $user_id, 'meta_key' => $meta_key], $this->core->config->db()['suffix'] . 'usermeta') > 0) {
            return $this->core->db->update(['meta_value' => $meta_value], $this->core->config->db()['suffix'] . 'usermeta', ['user_id' => $user_id, 'meta_key' => $meta_key]);
        } else {
            return $this->core->db->insert([
                'meta_value' => $meta_value,
                'meta_key' => $meta_key,
                'user_id' => $user_id,
            ], $this->core->config->db()['suffix'] . 'usermeta');
        }

    }

    /**
     * @param int $user_id
     * @param $meta_key
     * @return mixed
     */
    public function get_user_meta($user_id, $meta_key)
    {
        return $this->core->db->getWhere(['user_id' => $user_id, 'meta_key' => $meta_key], $this->core->config->db()['suffix'] . 'usermeta')[0];
    }

    /**
     * @param int $user_id
     * @return array|bool
     */
    public function all_meta($user_id)
    {
        return $this->core->db->getWhere(['user_id' => $user_id], $this->core->config->db()['suffix'] . 'usermeta');
    }

    /**
     * @return mixed
     */
    public function get_current()
    {
        $id = cookie_get('id');
        $user = $this->core->db->getWhere(['id' => $id], $this->core->config->db()['suffix'] . 'user');
        return $user[0];
    }

    /**
     * @return mixed
     */
    public function get_login()
    {
        return $this->current_user['login'];
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function get_login_by_id($id)
    {
        $user = $this->get_by_id($id);
        return $user['login'];

    }

    /**
     * @param $format
     * @return bool|string
     */
    public function get_dt_add($format)
    {
        return date($format, $this->current_user['dt_add']);
    }

    /**
     * Удаляет куки
     */
    public function logout()
    {
        cookie_set('id', '');
        cookie_set('user_hash', '');
        cookie_set('ip', '');
    }

    /**
     * @param array $where
     * @return array|bool
     */
    public function get_all($where = [])
    {
        if (empty($where)) {
            return $this->core->db->getAll("SELECT * FROM " . $this->core->config->db()['suffix'] . "user");
        } else {
            return $this->core->db->getWhere($where, $this->core->config->db()['suffix'] . "user");
        }
    }

    /**
     * @param bool $id
     * @return bool
     */
    public function get_rule($id = false)
    {
        if ($id) {
            $assign = $this->core->db->getByField('user_id', $id, $this->core->config->db()['suffix'] . "assignment");
        } else {
            $assign = $this->core->db->getByField('user_id', cookie_get('id'), $this->core->config->db()['suffix'] . "assignment");
        }
        if (empty($assign)) {
            return false;
        } else {
            return $this->core->db->getFromId($assign[0]['rule_id'], $this->core->config->db()['suffix'] . "rule")['name'];
        }

    }

    /**
     * @return mixed
     */
    public function test()
    {
        $this->core->db
            ->find($this->core->config->db()['suffix'] . "user", '*')
            ->where(['id' => 5])
            ->orWhere(['name' => "Артем"], 'AND');
        return $this->core->db->query;
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, $data)
    {
        if ($this->get_by_id($id)) {
            foreach ($data as $key => $item) {
                if ($key == 'name' || $key == 'last_name' || $key == 'photo') {
                    $this->core->db->update([$key => $item], db_table('user'), ['id' => $id]);
                } else {
                    $this->add_user_meta($id, $key, $item);
                }
            }
            return true;
        }
        return false;
    }

    /**
     * @param bool $id
     * @return mixed
     */
    public function get_info($id = false)
    {
        if (!$id) {
            $id = cookie_get('id');
        }
        $arr = $this->all_meta($id);
        $arr2 = $this->get_all(['id' => $id]);
        $array = $arr2[0];
        foreach ($arr as $item) {
            $array[$item['meta_key']] = $item['meta_value'];
        }
        return $array;

    }

    /**
     * @param string $pass_old
     * @param string $pass_new
     * @param bool $id
     * @return array|bool
     */

    public function update_pass($pass_old, $pass_new, $id = false)
    {
        $id = ($id) ? $id : cookie_get('id');
        $user = $this->get_by_id($id);
        if ($user['pass'] == md5(md5($pass_old))) {
            return $this->set_pass($id, $pass_new);

        }
        return false;
    }

    /**
     * @param int $id
     * @param string $pass_new
     * @return array|bool
     */
    public function set_pass($id, $pass_new)
    {
        $pass_new = md5(md5($pass_new));
        return $this->core->db->update(['pass' => $pass_new], $this->core->config->db()['suffix'] . "user", ['id' => $id]);
    }
}