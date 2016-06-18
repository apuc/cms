<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 13:13
 */

$header->addScript('script', theme_dir_uri() . 'js/script.js', 1);
$header->addScript('script2', theme_dir_uri() . 'js/script_footer.js', 1, true);
$header->addStyle('style', theme_dir_uri() . 'css/style.css', 1);

function hello(){
    echo "Привет";
}