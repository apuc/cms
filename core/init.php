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
require_once ('Head.php');
require_once ('Category.php');
require_once ('Forms.php');
require_once ('Url.php');
require_once ('Ajax.php');
require_once ('Phpmailer.php');
require_once ('ObjectRecord.php');
require_once ('GetRecords.php');

$core = new Core();

$cookie = new Cookie();
$config = new Config();
$options = new Options();
$record = new Records();
$record_meta = new RecordMeta();
$header = new Head();
$category = new Category();
$form = new Forms();
$url = new Url();
$mailer = new PHPMailer();


require_once ('functions/config.php');
require_once ('functions/cookie.php');
require_once ('functions/options.php');
require_once ('functions/parser.php');
require_once ('functions/record.php');
require_once ('functions/record_meta.php');
require_once ('functions/category.php');
require_once ('functions/forms.php');
require_once ('functions/url.php');
require_once ('functions/mail.php');

require_once ('User.php');
require_once ('functions/user.php');
$user = new User();


require_once ('App.php');
require_once ('RecordHook.php');
require_once ('Settings.php');
require_once ('functions/record_hook.php');
$record_hook = new RecordHook();
$settings = new Settings();

$ajax = new Ajax();

$rout = new Routing();

require_once ('functions/theme.php');

$load = $rout->run();
if($load[0] == 'admin'){
    include (ROOT_DIR . '/core/admin/index.php');
}
else{
    $records = new GetRecords($load);

    include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/admin/admin.php');
    include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/func.php');
    if($load[0] == 'index'){
        include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/index.php');
    }
    if($load[0] == 'category'){
        if(file_exists(ROOT_DIR . '/public/themes/' . $options->get('theme') . '/category-type-'.$records->type.'.php')){
            include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/category-type-'.$records->type.'.php');
        }
        else{
            if(file_exists(ROOT_DIR . '/public/themes/' . $options->get('theme') . '/category-'.$records->page_type_name.'.php')){
                include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/category-'.$records->page_type_name.'.php');
            }
            else {
                include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/category.php');
            }
        }
    }
    if($load[0] == 'type'){
        if(file_exists(ROOT_DIR . '/public/themes/' . $options->get('theme') . '/type-'.$records->page_type_name.'.php')){
            include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/type-'.$records->page_type_name.'.php');
        }
        else {
            include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/type.php');
        }
    }
    if($load[0] == 'record'){
        if(file_exists(ROOT_DIR . '/public/themes/' . $options->get('theme') . '/record-'.$records->type.'.php')){
            include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/record-'.$records->type.'.php');
        }
        else {
            include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/record.php');
        }
    }
    if($load[0] == '404'){
        header("HTTP/1.1 404 Not Found");
        header('Status: 404 Not Found');
        prn($_SERVER);
    }


}
//include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/func.php');
//include (ROOT_DIR . '/public/themes/' . $options->get('theme') . '/index.php');

