<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 16:09
 *
 */

$admin->addMenuItem('Отзывы', 'record', 'Отзывы', 'admin_record', 'fa-comment ');

function admin_record(){
    if(isset($_POST['title'])){
        foreach($_POST as $k => $post){
            set_option($k, $post);
        }
        render_admin('/admin_lte/views/alert_success.php', [
            'title' => 'Настрйки сохранены',
            'msg' => 'Удачное сохранение'
        ]);
    }
    render_admin('/admin_lte/views/options.php', []);
}