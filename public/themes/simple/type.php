<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 06.07.2016
 * Time: 10:13
 */
echo 'type';

foreach($records->get_records() as $record){
    prn($record->get_author());
}