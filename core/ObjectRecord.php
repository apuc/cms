<?php

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 14.10.2016
 * Time: 22:24
 */
class ObjectRecord
{
    public $id;
    public $title;
    public $author;
    public $dt_add;
    public $dt_update;
    public $content;
    public $status;
    public $slug;
    public $views;
    public $type;
    public $comment;
    public $comment_count;
    public $photo;
    public $count;
    public $page_type;
    public $page_type_name;

    public function get_record($id, $return = false){
        $r = record_get($id);
        $this->id = $id;
        $this->title = $r['title'];
        $this->author = $r['author'];
        $this->dt_add = $r['dt_add'];
        $this->dt_update = $r['dt_update'];
        $this->content = $r['content'];
        $this->status = $r['status'];
        $this->slug = $r['slug'];
        $this->views = $r['views'];
        $this->type = $r['type'];
        $this->comment = $r['comment'];
        $this->comment_count = $r['comment_count'];
        $this->photo = $r['photo'];
        if($return){
            return $this;
        }
    }

    public function get_title(){
        return $this->title;
    }

    public function get_author(){
        return user_get_info($this->author);
    }

}