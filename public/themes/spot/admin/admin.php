<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 13.10.2016
 * Time: 17:11
 */

$record->addRecordsType(['title' => 'Работы', 'type' => 'works', 'icon' => 'fa-briefcase', 'order' => 10]);
$category->addCategoryTypeGroup('Вид работы', 'type_works', 'works');

$record_hook->addCustomField('author','feedback', 'feedback_custom', true);
$record_hook->addToSave('author','feedback', 'save_custom', true);

function feedback_custom($app)
{
    render('/views/author_input.php',[]);
}

function save_custom($app)
{

}