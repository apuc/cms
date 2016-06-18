<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 09.06.2016
 * Time: 11:35
 */
/**
 * @
 */
$admin->addMenuItem('Права пользователя', 'rules', 'rules_func', ['admin'], 1, 'fa-key', true, true);
$admin->addMenuItem('Добавить роль', 'add_rule', 'add_rules_func', ['admin'], 1, 'fa-key', false, true);
$admin->addMenuItem('Присвоить роль', 'add_assignment', 'assignment_func', ['admin'], 1, 'fa-key', false, true);

function rules_func($app)
{
    if (isset($_GET['del'])) {
        $app->core->db->queryDelete($app->core->config->db()['suffix'] . "rule", $_GET['del']);
        render_admin('/admin_lte/views/alert_success.php', [
            'title' => 'Роль успешно удалена!',
            'msg' => '<a href="/' . config_routing('admin-panel') . '/rules">Список ролей</a>',
        ]);
    }

    $rul = $app->core->db->getAll("SELECT * FROM " . $app->core->config->db()['suffix'] . "rule");
    render_admin('/admin_lte/views/table_rules.php', [
        'rule' => $rul,
    ]);
}

function add_rules_func($app)
{
    if (isset($_POST['submit'])) {

        if (empty($_POST['name']) || empty($_POST['desc'])) {
            render_admin('/admin_lte/views/alert_error.php', [
                'title' => 'Поля Имя и Описание обязательны к заполнению!',
                'msg' => 'Заполните пожалуйста поля!',
            ]);
        } else {
            $ins = $app->core->db->insert(['name' => $_POST['name'], 'description' => $_POST['desc']], $app->core->config->db()['suffix'] . "rule");
            render_admin('/admin_lte/views/alert_success.php', [
                'title' => 'Роль успешно добавлена',
                'msg' => '<a href="/' . config_routing('admin-panel') . '/rules">Список ролей</a>',
            ]);
        }
    }
    render_admin('/admin_lte/views/add_rules_form.php', []);

}

function assignment_func($app)
{
    if (isset($_GET['assign'])) {
        $rul = $app->core->db->getAll("SELECT * FROM " . $app->core->config->db()['suffix'] . "rule");
        render_admin('/admin_lte/views/assignment_form.php', [
            'rule' => $rul,
            'id' => $_GET['assign'],
        ]);

    } elseif (isset($_POST['submit'])) {
        $app->core->db->queryDeleteByField(db_table("assignment"), 'user_id', $_POST['user_id']);
        $app->core->db->insert([
            'user_id' => $_POST['user_id'],
            'rule_id' => $_POST['rule'],
            'dt_add' => time(),
        ],db_table("assignment"));
        render_admin('/admin_lte/views/alert_success.php', [
            'title' => 'Роль успешно добавлена пользователю',
            'msg' => '<a href="/' . config_routing('admin-panel') . '/rules">Список ролей</a>',
        ]);
        render_admin('/admin_lte/views/assignment_table.php', [
            'users' => user_get_all(),
        ]);
    } else {
        render_admin('/admin_lte/views/assignment_table.php', [
            'users' => $app->core->db->find(db_table("user"),
                "`k_user`.`id` AS user_id, `k_user`.`name`, email, login, `k_user`.`dt_add`, `k_rule`.`name` AS rule_name ")
                ->join('`k_assignment`','`k_assignment`.`user_id` = `k_user`.`id`')
                ->join('`k_rule`', '`k_rule`.`id` = `k_assignment`.`rule_id`')
                ->all(),
        ]);

    }
}

