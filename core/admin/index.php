<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 13:51
 */
$admin = new Admin();

$adminConfig = new AdminConfig();

global $options;

foreach($adminConfig->get()['mods'] as $mod){
    include (ROOT_DIR . '/core/admin/mods/' . $mod . '/func.php');
}

//include (ROOT_DIR . '/core/admin/mods/options/func.php');

include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/admin/admin.php');

include ('skins/admin_lte/index.php');

