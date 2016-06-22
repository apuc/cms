<?php
/**
 * Created by PhpStorm.
 * User: Nancy
 * Date: 14.06.2016
 * Time: 13:02
 */
function record_add($data)
{
    global $record;
    return $record->add($data);
}

function record_get($id)
{
    global $record;
    return $record->get($id);
}

function record_get_by_slug($slug)
{
    global $record;
    return $record->getBySlug($slug);
}

function record_update($id, $data)
{
    global $record;
    return $record->update($id, $data);
}

function record_set($data)
{
    global $record;
    return $record->set($data);
}

function record_get_by_type($record_type)
{
    global $record;
    return $record->get_by_type($record_type);
}

function record_get_category($id)
{
    global $record;
    return $record->getCategory($id);
}

