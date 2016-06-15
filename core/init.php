<?php
date_default_timezone_set('Europe/Moscow');
require_once ('functions/debug.php');
require_once ('functions/uri.php');

require_once (ROOT_DIR . '/config/Config.php');
require_once (ROOT_DIR . '/core/admin/config/adminConfig.php');
require_once ('Db.php');
require_once ('Cookie.php');
require_once ('Parser.php');
require_once ('Core.php');
require_once ('Admin.php');
require_once ('Options.php');
require_once ('Routing.php');
require_once ('Records.php');
require_once ('RecordMeta.php');


$cookie = new Cookie();
$config = new Config();
$options = new Options();
$record = new Records();
$record_meta = new RecordMeta();

require_once ('functions/config.php');
require_once ('functions/cookie.php');
require_once ('functions/options.php');
require_once ('functions/parser.php');
require_once ('functions/record.php');
require_once ('functions/record_meta.php');

require_once ('User.php');
require_once ('functions/user.php');
$user = new User();

$core = new Core();

$rout = new Routing();
$load = $rout->run();
if($load == 'admin'){
    include (ROOT_DIR . '/core/admin/index.php');
}
else{
    include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/func.php');
    include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/index.php');
}
//include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/func.php');
//include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/index.php');

