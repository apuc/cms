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

$settings->addSection('Настройки главной','main');

$settings->addSetting('spot_main_name', 'main',[
    'field_type' => 'text',
    'label' => 'Имя сайта',
    'default_value' => 'Art Craft',
    'placeholder' => 'Имя сайта'
]);

$settings->addSetting('spot_main_h1', 'main',[
    'field_type' => 'text',
    'label' => 'h1 на главной',
    'default_value' => 'Заголовок h1',
]);

$settings->addSetting('spot_main_h2', 'main',[
    'field_type' => 'textarea',
    'label' => 'h2 на главной',
    'default_value' => 'Описание сайта',
]);

$settings->addSetting('spot_main_logo', 'main',[
    'field_type' => 'file',
    'label' => 'Логотип',
]);

$settings->addSetting('spot_main_bg', 'main',[
    'field_type' => 'file',
    'label' => 'Фон',
]);

$settings->addSetting('spot_main_select', 'main',[
    'field_type' => 'select',
    'label' => 'Тип контента',
    'default_value' => 1,
    'options' => [1=>'Тип 1', 2=>'Тип 2']
]);

$settings->addSection('Настройки header','header');

$settings->addSetting('spot_header', 'header',[
    'field_type' => 'text',
    'label' => 'Название компании',
    'default_value' => '',
    'placeholder' => 'Компания'
]);