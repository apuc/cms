<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 09.06.2016
 * Time: 13:21
 */
function user_add($args)
{
    global $user;
    return $user->add($args);
}

function user_get_by_id($id)
{
    global $user;
    return $user->get_by_id($id);
}

function user_get($login, $pass)
{
    global $user;
    return $user->get($login, $pass);
}

function user_login($login, $pass)
{
    global $user;
    return $user->login($login, $pass);
}

function add_user_meta($user_id, $meta_key, $meta_value)
{
    global $user;
    return $user->add_user_meta($user_id, $meta_key, $meta_value);
}

function get_user_meta($user_id, $meta_key)
{
    global $user;
    return $user->get_user_meta($user_id, $meta_key);
}

function all_meta($user_id)
{
    global $user;
    return $user->all_meta($user_id);
}

function get_current()
{
    global $user;
    return $user->get_current();
}

function get_login()
{
    global $user;
    return $user->get_login();
}

function get_dt_add($format)
{
    global $user;
    return $user->get_dt_add($format);
}

function logout()
{
    global $user;
    $user->logout();
}

function user_get_all($where = [])
{
    global $user;
    return $user->get_all($where);
}

function user_get_rule($id = false)
{
    global $user;
    return $user->get_rule($id);
}

function user_update($id, $data)
{
    global $user;
    return $user->update($id, $data);
}

function user_get_info($id = false)
{
    global $user;
    return $user->get_info($id);
}

function user_update_pass($pass_old, $pass_new, $id = false)
{
    global $user;
    return $user->update_pass($pass_old, $pass_new, $id);
}

function user_set_pass($id, $pass_new)
{
    global $user;
    return $user->set_pass($id, $pass_new);
}

function user_get_login_by_id($id)
{
    global $user;
    return $user->get_login_by_id($id);
}