<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 16:09
 *
 */

$admin->addMenuRecord('Записи', 'record', 'Записи', 'fa-comment');


$admin->addMenuItem('Добавить запись', 'add_record', 'Добавить запись', 'admin_add_record', '', false);

function admin_add_record() {
    prn($_POST);
}