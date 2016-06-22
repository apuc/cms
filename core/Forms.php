<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 21.06.2016
 * Time: 10:27
 */
class Forms
{
    /**
     * ������ �����
     * @param bool|false $options array �����
     * @param $method string �����
     * @param $action string �����
     * @return string
     */
    public function begin($options = [], $method = 'POST', $action = '')
    {
        $op = $this->getOptions($options);
        return "<form action='$action' method='$method' $op>";
    }

    /**
     * ����� �����
     * @return string
     */
    public function end()
    {
        return "</form>";
    }

    /**
     * ���������� ������
     * @param $name string
     * @param $selected integer
     * @param $data array
     * @param bool|false $options array
     * @return string
     */
    public function dropDownList($name, $selected, $data, $options = false)
    {
        $d = '';
        if ($options['prompt']) {
            $d .= "<option>" . $options['prompt'] . "</option>";
        }
        foreach ($data as $k => $v) {
            if ($k == $selected && $selected != 0) {
                $d .= "<option selected value='$k'>$v</option>";
            } else {
                $d .= "<option value='$k'>$v</option>";
            }
        }
        unset ($options['prompt']);
        $op = $this->getOptions($options);
        /*if($options){
            foreach($options as $k => $v){
                $op .= "$k = '$v' ";
            }
        }*/
        return "<select name='$name' $op>$d</select>";
    }

    /**
     * @param $type string
     * @param $name string
     * @param string $value
     * @param bool|false $options array
     * @return string
     */
    public function input($type, $name, $value = '', $options = false)
    {
        $op = $this->getOptions($options);
        return "<input type='$type' name='$name' value='$value' $op>";
    }

    /**
     * @param $name
     * @param string $value
     * @param bool|false $options array
     * @return string
     */
    public function inputHidden($name, $value = '', $options = false)
    {
        $op = $this->getOptions($options);
        return "<input type='hidden' name='$name' value='$value' $op>";
    }

    /**
     * @param $name
     * @param string $value
     * @param bool|false $options false
     * @return string
     */
    public function inputText($name, $value = '', $options = false)
    {
        $op = $this->getOptions($options);
        return "<input type='text' name='$name' value='$value' $op>";
    }

    /**
     * @param $name
     * @param bool|integer|array $value
     * @param $data
     * @param bool|array $options
     * @return string
     */
    public function checkboxList($name, $value = false, $data, $options = false)
    {
        $op = $this->getOptions($options);
        $html = '';
        //in_array()
        foreach ($data as $key => $val) {
            $ch = (in_array($key, $value)) ? 'checked' : '';
            $html .= "<input name='" . $name . "[]' $ch type='checkbox' value='$key' $op>$val";
        }
        return $html;
    }

    /**
     * @param $name string
     * @param string $value
     * @param bool|false $options array
     * @return string
     */
    public function textarea($name, $value = '', $options = false)
    {
        $op = $this->getOptions($options);
        return "<textarea name='$name' $op>$value</textarea>";
    }

    public function label($value, $for, $options = false)
    {
        $op = $this->getOptions($options);
        return "<label for='$for' $op>$value</label>";
    }

    /**
     * @param $options array
     * @return string
     */
    public function getOptions($options)
    {
        $op = '';
        if ($options) {
            foreach ($options as $key => $value) {
                $op .= "$key = '$value'";
            }
        }
        return $op;
    }

    public function arrayMap($key, $value, $array)
    {
        $arr = [];
        foreach($array as $item){
            $arr[$item[$key]] = $item[$value];
        }
        return $arr;
    }
}