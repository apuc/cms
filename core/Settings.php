<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 16.10.2016
 * Time: 22:20
 */
class Settings
{

    public $settings;
    public $sections;
    private $app;

    function __construct()
    {
        $this->app = new App();
    }

    public function addSection($name, $slug){
        $this->sections[] = [
            'name' => $name,
            'slug' => $slug,
        ];
    }

    public function addSetting($name, $section, $data)
    {
        $this->settings[] = [
            'name' => $name,
            'section' => $section,
            'field_type' => $data['field_type'],
            'label' => $data['label'],
            'default_value' => $data['default_value'],
            'field_tpl' => $data['field_tpl'],
            'placeholder' => $data['placeholder'],
            'options' => $data['options'],
        ];
    }

    public function getSettings()
    {
        return $this->settings;
    }

    public function getSections(){
        return $this->sections;
    }

    public function getDefaultValue($name){
        foreach($this->settings as $setting){
            if($setting['name'] == $name){
                return $setting['default_value'];
            }
        }
    }

}