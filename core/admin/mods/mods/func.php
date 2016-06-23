<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 23.06.2016
 * Time: 14:54
 */
$admin->addMenuItem('Модули', 'mods', 'all_mods', ['admin'], 1, 'fa-cogs', true, true);
function all_mods($app)
{
    if (isset($_GET['to_active'])) {
        $all_mods = [];
        $mods = get_option('mods');
        if (empty($mods)) {
            $all_mods[] = $_GET['to_active'];
            set_option('mods', json_encode($all_mods));
        } else {
            $all_mods = json_decode($mods, JSON_UNESCAPED_UNICODE);
            if (!in_array($_GET['to_active'], $all_mods)) {
                $all_mods[] = $_GET['to_active'];
                set_option('mods', json_encode($all_mods));
            }
        }

    }
    if (isset($_GET['to_deactive'])) {
        $all_mods = [];
        $mods = get_option('mods');
        if (!empty($mods)) {
            $all_mods = json_decode($mods, JSON_UNESCAPED_UNICODE);
            if (($key = array_search($_GET['to_deactive'], $all_mods)) !== false) {
                unset($all_mods[$key]);
            }
            set_option('mods', json_encode($all_mods));
        }
    }
    if ($handle = opendir('public/mods/')) {
        /* Именно этот способ чтения элементов каталога является правильным. */
        $arr = [];
        while (false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                $content = file_get_contents('public/mods/' . $file . '/mod.info', true);
                $xml = new SimpleXMLElement($content);

                $mods = get_option('mods');
                if (empty($mods)) {
                    $xml->active = 0;
                } else {
                    $all_mods = json_decode($mods, JSON_UNESCAPED_UNICODE);
                    if (in_array($file, $all_mods)) {
                        $xml->active = 1;
                    }
                }
                $xml->path = $file;
                $arr[] = $xml;
            }
        }
        render_admin('/admin_lte/views/all_mods.php', [
            'slider' => $arr,
        ]);
        closedir($handle);
    }
}