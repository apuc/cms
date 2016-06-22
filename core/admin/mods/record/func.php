<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 16:09
 *
 */

$admin->addMenuRecord('Записи', 'record', ['admin', 'user'], 1, 'fa-comment');
$admin->addRecordSubItem('record', 'Все', 'all', true);
$admin->addRecordSubItem('record', 'Добавить', 'add', true);

$admin->addMenuItem('Добавить запись', 'add_record', 'admin_add_record', ['admin'], 1, '', false, true);
$admin->addMenuItem('Все звписи', 'all_record', 'admin_all_record', ['admin'], 1, '', false, true);
$admin->addMenuItem('Удаление записи', 'del_record', 'admin_del_record', ['admin'], 1, '', false, true);
$admin->addMenuItem('Редактировать запись', 'edit_record', 'admin_edit_record', ['admin'], 1, '', false, true);


function admin_add_record($app)
{
    $user = get_current();
    if (isset($_POST['submit'])) {

        $record_id = record_add([
            'title' => $_POST['title'],
            'author' => $user['id'],
            'content' => $_POST['content'],
            'type' => $_POST['type'],
            'photo' => $_POST['photo'],
        ]);
        $check_id = $_POST['check_id'];
        $check = substr($check_id, 0, -1);
        $check_i = explode(',', $check);
        foreach ($check_i as $ch) {
            $app->core->db->insert(['record_id' => $record_id, 'category_id' => $ch], db_table("category_relationship"));
        }
        render_admin('/admin_lte/views/alert_success.php', [
            'title' => 'Запись успешно добавлена!',
            'msg' => '<a href="/' . config_routing('admin-panel') . '/' . $_POST['type'] . '/all">Список записей</a>',
        ]);
    }
    global $category;
    render_admin('/admin_lte/views/add_record.php', [
        'type' => $_POST['type'],
        'category' => $category->category_group,
    ]);
}

function admin_all_record($app)
{

    $all_record = $app->core->db->getAll("SELECT * FROM " . db_table("records"));
    prn($all_record);
    render_admin('/admin_lte/views/record_form.php', [
        'all_record' => $all_record,


    ]);
}

function admin_del_record($app)
{
    if (isset($_GET['del'])) {
        $app->core->db->queryDelete($app->core->config->db()['suffix'] . "records", $_GET['del']);
        $app->core->db->queryDeleteByField(db_table("category_relationship"), 'record_id', $_GET['del']);
        render_admin('/admin_lte/views/alert_success.php', [
            'title' => 'Запись успешно удалена!',
            'msg' => '<a href="' . admin_url($_GET['type'] . '/all') . '">Список записей</a>',
        ]);
    }
}

function admin_edit_record($app)
{
    global  $category;
    if (isset($_POST['save'])) {
        $data['title'] = $_POST['title'];
        $data['content'] = $_POST['content'];
        $data['photo'] = $_POST['photo'];
        $data['dt_update'] = time();

        record_update($_POST['save'], $data);
        $check_id = $_POST['check_id'];
        $check = substr($check_id, 0, -1);
        $check_i = explode(',', $check);
        $app->core->db->queryDeleteByField(db_table("category_relationship"), 'record_id', $_POST['save']);
        foreach ($check_i as $ch) {
            $app->core->db->insert(['record_id' => $_POST['save'], 'category_id' => $ch], db_table("category_relationship"));
        }
        render_admin('/admin_lte/views/alert_success.php', [
            'title' => 'Запись успешно сохранена!',
            'msg' => '<a href="' . admin_url($_POST['type'] . '/all') . '">Список записей</a>',
        ]);
        render_admin('/admin_lte/views/edit_record.php', [
            'type' => $_POST['type'],
            'category' => $category->category_group,
            'record' => record_get($_POST['save']),
            'this_category' => record_get_category($_POST['save']),
        ]);
    }


}
