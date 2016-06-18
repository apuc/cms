<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 09.06.2016
 * Time: 11:35
 */

$admin->addMenuItem('Пользователи', 'users', 'users_func', ['admin'], 1, 'fa-users', true, true);
$admin->addMenuItem('Просмотреть профиль', 'users_view', 'users_view_func', ['admin'], 1, '', false, true);


function users_func($app)
{

    if (isset($_GET['del'])) {
        $app->core->db->queryDelete(db_table("user"), $_GET['del']);
        render_admin('/admin_lte/views/alert_success.php', [
            'title' => 'Пользователь успешно удален!',
            'msg' => '<a href="/' . config_routing('admin-panel') . '/users">Список пользователей</a>',
        ]);
    }
    $users = $app->core->db->getAll("SELECT * FROM " . db_table("user"));
    render_admin('/admin_lte/views/table_users.php', [
        'users' => $users,
    ]);
}

function users_view_func($app)
{
    if (isset($_GET['view'])) {
    }
    $use = $app->core->db
        ->find(db_table("user"), '*')
        ->where(['id' => $_GET['view']])
        ->all()[0];
    render_admin('/admin_lte/views/users_view_table.php', [
        'use' => $use,
    ]);
}
