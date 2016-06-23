<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 22.06.2016
 * Time: 16:15
 */
$admin->addMenuItem('Темы', 'theme', 'theme_func', ['admin'], 1, 'fa-picture-o', true, true);

function theme_func()
{
    if (isset($_GET['to_active'])) {
        set_option('theme', $_GET['to_active']);
    }
    if ($handle = opendir('public/themes/')) {
        /* Именно этот способ чтения элементов каталога является правильным. */
        $arr = [];
        while (false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                $content = file_get_contents('public/themes/' . $file . '/theme.info', true);
                $xml = new SimpleXMLElement($content);

                if (get_option('theme') == $file) {
                    $xml->active = 1;
                }
                $arr[] = $xml;
            }
        }
        render_admin('/admin_lte/views/theme.php', [
            'theme' => $arr,
        ]);
        closedir($handle);
    }
}

