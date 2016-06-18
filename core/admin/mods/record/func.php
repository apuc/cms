<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 16:09
 *
 */

$admin->addMenuRecord('Записи', 'record', ['admin', 'user'], 1, 'fa-comment');


$admin->addMenuItem('Добавить запись', 'add_record', 'admin_add_record', ['admin'], 1, '', false, true);
$admin->addMenuItem('Все звписи', 'all_record', 'admin_all_record', ['admin'], 1, '', false, true);
$admin->addMenuItem('Удаление записи', 'del_record', 'admin_del_record', ['admin'], 1, '', false, true);
$admin->addMenuItem('Редактировать запись', 'edit_record', 'admin_edit_record', ['admin'], 1, '', false, true);

function admin_add_record($app)
{
    prn($app->record_meta->get(2, 'cxzc'));

    render_admin('/admin_lte/views/add_record.php', [
       //'all_record' => $all_record,
    ]);
}

function admin_all_record($app)
{

    $all_record = $app->core->db->getAll("SELECT * FROM " . db_table("records"));
    prn($all_record);
    render_admin('/admin_lte/views/record_form.php', [
        'all_record' => $all_record,


    ]);
    //  echo "dfdsf";
}

function admin_del_record($app)
{
    if (isset($_GET['del'])) {
        $app->core->db->queryDelete($app->core->config->db()['suffix'] . "records", $_GET['del']);
        render_admin('/admin_lte/views/alert_success.php', [
            'title' => 'Запись успешно удалена!',
            'msg' => '<a href="/' . config_routing('admin-panel') . '/record">Список записей</a>',
        ]);
    }
}

function admin_edit_record($app)
{
    if (isset($_GET['edit'])) {
        $record = record_get($_GET['edit']);
        render_admin('/admin_lte/views/record_edit.php', [
            'record' => $record,
        ]);
    }
    if (isset($_POST['save'])) {
        $id = $_POST['id'];
        unset($_POST['id']);
        unset($_POST['save']);
        record_update($id, $_POST);
        $record = record_get($id);
        prn($record);
        render_admin('/admin_lte/views/record_edit.php', [
            'record' => $record,
        ]);
    }
}
