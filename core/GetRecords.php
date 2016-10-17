<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 15.10.2016
 * Time: 15:35
 */
class GetRecords
{

    public $page_type;
    public $page_type_name;
    public $count = 0;

    function __construct($load)
    {
        $this->page_type = $load[0];
        $this->page_type_name = $load[1];
        $this->get_records();
    }

    public function get_records(){
        $r = false;
        if($this->page_type == 'type'){
            $r = record_get_by_type($this->page_type_name);
        }
        elseif($this->page_type == 'category'){
            $cat = category_get_by_slug($this->page_type_name);
            $r = record_get_by_category($cat['id']);
            $this->type = $cat['record_type'];
        }
        elseif($this->page_type == 'record'){
            $rec = new ObjectRecord();
            $this->count = 1;
            $this->obj =  $rec->get_record($this->page_type_name, true);
            $this->type = $this->obj->type;
            return false;
        }
        else {
            return false;
        }
        $arr = [];
        foreach($r as $item){
            $rec = new ObjectRecord();
            $arr[] = $rec->get_record($item['id'], true);
            $this->count++;
        }
        return $arr;
    }

}