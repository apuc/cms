<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 13:51
 */
$admin = new Admin();

$adminConfig = new AdminConfig();

if ($handle = opendir('public/mods/')) {
    $mods = get_option('mods');
    $all_mods = json_decode($mods, JSON_UNESCAPED_UNICODE);
    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..') {
            if(in_array($file,$all_mods)){
                include (ROOT_DIR . '/public/mods/' . $file .'/func.php');
                include (ROOT_DIR . '/public/mods/' . $file .'/admin/admin.php');
            }
        }
    }
}

foreach($adminConfig->get()['mods'] as $mod){
    include (ROOT_DIR . '/core/admin/mods/' . $mod . '/func.php');
}

//include (ROOT_DIR . '/core/admin/mods/options/func.php');

include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/admin/admin.php');

$record->registerRecordType();
$category->registerCategory();
$cookie->set_all_cookie();
$admin->sortMenu();

if($rout->get_slug() == 'ajax'){
    include ('ajax.php');
}
else {
    if($user->current_user){
        include ('skins/admin_lte/index.php');
    }
    else {
        if($rout->get_slug() != "auth" && $rout->get_slug() != "register"){
            header("Location: /" . $core->config->routing()['admin-panel'] . "/auth");
        }
        include ('skins/admin_lte/index.php');
    }
}



