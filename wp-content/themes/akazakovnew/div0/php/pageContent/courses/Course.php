<?php


class Course
{
    private $id;
    private $title;
    private $excerpt;
    private $guid;
    private $thumb;
    function __construct($id, $title, $excerpt, $guid, $thumb)
    {
        $this->id = $id;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->guid = $guid;
        $this->thumb = $thumb;
    }
    
    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getExcerpt(){
        return $this->excerpt;
    }
    public function getGuid(){
        return $this->guid;
    }
    
    /*
    public function setThumb($thumb){
        $this->thumb = $thumb;
    }
    */
    
    public function getThumb(){
        return $this->thumb;
    }
}