<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 10.06.2016
 * Time: 12:07
 */
$admin->addMenuItem('Авторизация', 'auth', 'auth_func', ['admin'], 2, 'fa-arrow-circle-o-right ');
function auth_func()
{
    render_admin('/admin_lte/views/auth_form.php', []);
}

$cookie->hook('admin_auth');

function admin_auth()
{
    global $core;
    if (isset($_POST['submit'])) {
        if (isset($_POST['auth_form'])) {
            $login = user_login($_POST['login'], $_POST['pass']);
            if ($login === true) {
                header("Location: /" . $core->config->routing()['admin-panel'] . "/");
            }
        }
    }
    if (isset($_GET['logout'])) {
        logout();
        header("Location: /" . $core->config->routing()['admin-panel'] . "/");
    }

}