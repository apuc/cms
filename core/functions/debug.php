<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 25.05.2016
 * Time: 11:57
 */
function prn($content)
{
    echo '<pre style="background: lightgray; border: 1px solid black; padding: 2px">';
    print_r($content);
    echo '</pre>';
}