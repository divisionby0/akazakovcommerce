<?php

class TagsParser
{
    function __construct()
    {
    }

    public static function parse($rawData){
        $data = json_decode($rawData);
        $tagsData = $data->tags;

        $total = sizeof($tagsData);

        $result = array();
        
        for($i=0; $i<$total; $i++){
            $currentTagData =  $tagsData[$i];

            $currentTag = $currentTagData->name;
            array_push($result, $currentTag);
        }
        
        return $result;
    }

}