<?php

require_once ('functions/debug.php');
require_once ('functions/uri.php');

require_once (ROOT_DIR . '/config/Config.php');
require_once (ROOT_DIR . '/core/admin/config/adminConfig.php');
require_once ('Db.php');
require_once ('Parser.php');
require_once ('Core.php');
require_once ('Admin.php');
require_once ('Options.php');
require_once ('Routing.php');
require_once ('Records.php');


$config = new Config();
$options = new Options();

require_once ('functions/options.php');
require_once ('functions/parser.php');

$rout = new Routing();
$load = $rout->run();
if($load == 'admin'){
    include (ROOT_DIR . '/core/admin/index.php');
}
//include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/func.php');
//include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/index.php');

