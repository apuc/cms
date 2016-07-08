<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 08.07.2016
 * Time: 14:59
 */
$admin->addMenuItem('Почта', 'mail', 'func_mail', ['admin'], 1, 'fa-envelope-o ', true, true);

function func_mail()
{
    if(isset($_POST['from_mail'])){
        foreach($_POST as $k => $post){
            set_option($k, $post);
        }
        render_admin('/admin_lte/views/alert_success.php', [
            'title' => 'Настрйки сохранены',
            'msg' => 'Удачное сохранение'
        ]);
    }
    render_admin('/admin_lte/views/send_mail.php', []);
}