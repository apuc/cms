<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 23.06.2016
 * Time: 14:43
 */

function slider_test(){
    prn(321);

    echo form_checkboxList('cbl',['checked'=>1],['cbl1','cbl2','cbl3'],['id'=>'cbl_id', 'class'=>'cbl_class']);
    echo form_createForm([
        'id' => 'crForm',
        'class' => 'crFormClass',
        'action' => 'test.php',
        'method' => 'post',
        'items' => [
            [
                'type' => 'text',
                'name' => 'login',
                'id' => 'loginId',
                'class' => 'loginClass',
                'value' => '23',
                'placeholder' => 'login'
            ],
            [
                'type' => 'text',
                'name' => 'login',
                'value' => '23',
                'options'=>[ 'id' => 'loginId', 'class' => 'loginClass', 'placeholder' => 'login']
            ],
            [
                'type' => 'dropDownList',
                'name' => 'ddp2',
                'selected'=> 1,
                'data' => ['val1','val2','val3'],
                'options'=>['id'=>'3','class'=>'my_ddp']
            ],
            [
                'type' => 'radiobuttonsList',
                'name' => 'rbl',
                'value' => ['checked'=>1],
                'data' => ['inp_1','inp_2','inp_3'],
                'options'=> ['id'=>'my_rbl', 'class'=>'my_rbl_class']
            ],
            [
                'type' => 'checkboxList',
                'name' => 'cbl',
                'value' => ['checked'=>1],
                'data' => ['cbl1','cbl2','cbl3'],
                'options' =>['id'=>'cbl_id', 'class'=>'cbl_class']
            ],
            [
                'type' => 'password',
                'name' => 'pwd',
                'value' => '',
                'options' => ['class'=>'pwd_class']

            ]
        ]
    ]);
}