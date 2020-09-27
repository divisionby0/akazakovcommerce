<?php

class GetCoursesQuery
{
    private $db;
    function __construct($db)
    {
        $this->db = $db;
        $this->execute();
    }

    public function execute(){
        $courses = $this->db->get_results("SELECT ID, post_title, post_excerpt, guid FROM wp_posts WHERE post_type='lp_course' AND post_status='publish'");
        return $courses;
    }
}