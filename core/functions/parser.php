<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 26.05.2016
 * Time: 12:55
 */

function render_admin($tpl, $data, $view = true)
{
    global $core;
    return $core->parser->render(ROOT_DIR . '/core/admin/skins/' . $tpl, $data, $view);
}

function render($tpl, $data, $view = true)
{
    global $core;
    global $options;
    return $core->parser->render(ROOT_DIR . '/public/themes/' . $options->get('theme') . $tpl, $data, $view);
}