<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 21.06.2016
 * Time: 13:57
 */

if(isset($_POST['action'])){
    $ajax->perform($_POST['action']);
}