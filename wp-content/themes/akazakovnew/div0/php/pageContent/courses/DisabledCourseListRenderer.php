<?php

class DisabledCourseListRenderer extends CourseListRenderer
{
    protected function createChildren(){
        echo "<div class='courseListItem' style='opacity:0.4'>";
        echo "<img src='".$this->data->getThumb()."'>";
        echo "<div class='courseListItemTitle'>".$this->data->getTitle()."</div>";
        echo "<div class='courseListItemExcerpt'>".$this->data->getExcerpt()."</div>";
        echo "</div>";
    }
}