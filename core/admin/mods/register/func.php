<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 09.06.2016
 * Time: 11:35
 */

$admin->addMenuItem('Регистрация', 'register', 'Регистрация', 'register_func', 'fa-registered');

function register_func()
{
    if (isset($_POST['submit'])) {
        global $core;
        /*prn($_POST);
        prn($core->db->_isset(['login' => $_POST['login']], $core->config->db()['suffix'] . 'user',true));
        prn($core->db->_isset(['email' => $_POST['email']], $core->config->db()['suffix'] . 'user', true));*/
        if (!$core->db->_isset(['login' => $_POST['login']], $core->config->db()['suffix'] . 'user', true)
            or !$core->db->_isset(['email' => $_POST['email']], $core->config->db()['suffix'] . 'user', true)
        ) {

            $args = [
                'login'=> $_POST['login'],
                'email'=> $_POST['email'],
                'pass'=> $_POST['pass'],
                'meta'=> [
                    'name'=> $_POST['name'],
                ]
            ];
            $rule = $core->db->getByField('name',config_user('rule'),$core->config->db()['suffix'] . 'rule')[0]['id'];
            //prn($rule);
            $res = user_add($args);
            $core->db->insert(['rule_id' => $rule, 'user_id' => $res], $core->config->db()['suffix'] . 'assignment');
            if(is_array($res)){
                render_admin('/admin_lte/views/alert_error.php', [
                    'title' => $res['error_msg'],
                    'msg' => 'Код ошибки '.$res['error_code'],
                ]);
            }
        } else {
            render_admin('/admin_lte/views/alert_error.php', [
                'title' => 'Логин или email уже заняты!',
                'msg' => 'Выберите другие'
            ]);
        }
    }
    render_admin('/admin_lte/views/register_form.php', []);

}

