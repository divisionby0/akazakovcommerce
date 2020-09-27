<?php

class CoursesPageContent
{
    private $db;
    private $courses;
    
    function __construct($db)
    {
        $this->db = $db;
        $coursesData = $this->getCourses();

        $this->parse($coursesData);
        $this->iterateCourses();
    }
    
    private function iterateCourses(){
        for($i=0; $i<sizeof($this->courses); $i++){
            $currentCourse = $this->courses[$i];

            if(is_user_logged_in()){
                new CourseListRenderer($currentCourse);
            }
            else{
                new DisabledCourseListRenderer($currentCourse);
            }
        }
    }
    
    private function getCourses(){
        $getCoursesQuery = new GetCoursesQuery($this->db);
        return $getCoursesQuery->execute();
    }

    private function parse($courses){
        $this->courses = array();
        foreach ($courses as $course){
            $courseId = $course->ID;
            $courseTitle = $course->post_title;
            $courseDescriptionExcerpt = $course->post_excerpt;

            $courseGuid = get_permalink( $courseId );
            $img = get_the_post_thumbnail_url($courseId);

            array_push($this->courses, new Course($courseId, $courseTitle, $courseDescriptionExcerpt, $courseGuid, $img));
        }
    }
}