<?php
class CourseListRenderer
{
    protected $data;
    function __construct($data)
    {
        $this->data = $data;
        $this->createChildren();
    }
    
    protected function createChildren(){
        echo "<a href='".$this->data->getGuid()."'><div class='courseListItem'>";
        echo "<img src='".$this->data->getThumb()."'>";
        echo "<div class='courseListItemTitle'>".$this->data->getTitle()."</div>";
        echo "<div class='courseListItemExcerpt'>".$this->data->getExcerpt()."</div>";
        echo "</div></a>";
    }
}