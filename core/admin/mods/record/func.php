<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 16:09
 *
 */

$admin->addMenuRecord('Записи', 'record', 'Записи', 'fa-comment');


$admin->addMenuItem('Добавить запись', 'add_record', 'Добавить запись', 'admin_add_record', '', false, true);

function admin_add_record($app) {
    prn($app->record_meta->get(2, 'cxzc'));

}