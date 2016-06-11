<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 13:51
 */
$admin = new Admin();

$adminConfig = new AdminConfig();


foreach($adminConfig->get()['mods'] as $mod){
    include (ROOT_DIR . '/core/admin/mods/' . $mod . '/func.php');
}

//include (ROOT_DIR . '/core/admin/mods/options/func.php');

include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/admin/admin.php');

$cookie->set_all_cookie();

if($user->current_user){
    include ('skins/admin_lte/index.php');
}
else {
    if($rout->get_slug() != "auth" && $rout->get_slug() != "register"){
        header("Location: /" . $core->config->routing()['admin-panel'] . "/auth");
    }
    include ('skins/admin_lte/index.php');
}




