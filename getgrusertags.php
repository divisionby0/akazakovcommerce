<?php
/**
 * Created by PhpStorm.
 * User: ilya
 * Date: 16.09.2020
 * Time: 18:20
 */

$apiKey = "cc80bb3e1fad780dd51a90a3344f8098";
$email = "kazakov8405@gmail.com";
$url = "https://api.getresponse.com/v3/contacts?query[email]=".$email."&fields=contactId";

$timeout = 8;

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_ENCODING => 'gzip,deflate',
    CURLOPT_FRESH_CONNECT => 1,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_TIMEOUT => $timeout,
    CURLOPT_HEADER => false,
    CURLOPT_USERAGENT => 'PHP GetResponse client 0.0.2',
    CURLOPT_HTTPHEADER => array('X-Auth-Token: api-key ' . $apiKey, 'Content-Type: application/json')
);

$state_ch = curl_init();
curl_setopt_array($state_ch, $options);
$contactData = curl_exec($state_ch);
$response = json_decode($contactData);
curl_close($state_ch);

echo "<p>response:</p>";
var_dump($response);

if(isset($response)){
    if(isset($response[0])){
        $userId = $response[0]->contactId;

        echo "<p>GR user id:".$userId."</p>";

        $url = "https://api.getresponse.com/v3/contacts/".$userId;

        $options[CURLOPT_URL] = $url;
        $state_ch2 = curl_init();
        curl_setopt_array($state_ch2, $options);
        $responseData = curl_exec($state_ch2);

        $data = json_decode($responseData);
        
        $tagsData = $data->tags;

        $total = sizeof($tagsData);

        $result = array();

        for($i=0; $i<$total; $i++){
            $currentTagData =  $tagsData[$i];

            $currentTag = $currentTagData->name;
            array_push($result, $currentTag);
        }

        echo "<p>tags:</p>";
        var_dump($result);
    }
}