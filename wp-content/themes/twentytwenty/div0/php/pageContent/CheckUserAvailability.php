<?php

class CheckUserAvailability
{
    private $isLoggedIn;
    private $id;
    
    function __construct()
    {
        $this->isLoggedIn = is_user_logged_in();
        $this->id = get_the_ID();
    }
    
    public function execute(){
        if($this->isLoggedIn == true || $this->isLoggedIn == 1){
            $current_user = wp_get_current_user();
            $userEmail = $current_user->user_email;

            $apiKey = get_option("getResponseOption");

            $terms = get_the_terms( $this->id, "course_tag" )[0];
            $courseTag = get_the_terms( $this->id, "course_tag" )[0]->name;
            
            $getRemoteTagsQuery = new GetRemoteEmailTags($apiKey, $userEmail);
            $remoteTags = $getRemoteTagsQuery->execute();
            
            $courseAvailableForCurrentEmail = in_array($courseTag, $remoteTags);

            if($courseAvailableForCurrentEmail == true){
                return array("result"=>true,"apiKey"=>$apiKey, "userEmail"=>$userEmail, "courseTag"=>$courseTag);
            }
            else{
                return array("result"=>false, "error"=>AppError::$NOT_PAYED);
            }
        }
        else{
            return array("result"=>false, "error"=>AppError::$NOT_LOGGED_IN);
        }
    }
}