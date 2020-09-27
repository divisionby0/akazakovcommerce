<?php


class GetRemoteEmailTags
{
    private $apiKey;
    private $email;
    private $url;
    private $userId;

    function __construct($apiKey, $email)
    {
        $this->apiKey = $apiKey;
        $this->email = $email;
        $this->url = "https://api.getresponse.com/v3/contacts?query[email]=".$email."&fields=contactId";
    }

    public function execute(){
        $timeout = 8;

        $options = array(
            CURLOPT_URL => $this->url,
            CURLOPT_ENCODING => 'gzip,deflate',
            CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_HEADER => false,
            CURLOPT_USERAGENT => 'PHP GetResponse client 0.0.2',
            CURLOPT_HTTPHEADER => array('X-Auth-Token: api-key ' . $this->apiKey, 'Content-Type: application/json')
        );

        $state_ch = curl_init();
        curl_setopt_array($state_ch, $options);
        $contactData = curl_exec($state_ch);
        $response = json_decode($contactData);
        curl_close($state_ch);

        $tags = array();

        if(isset($response)){
            if(isset($response[0])){
                $this->userId = $response[0]->contactId;
                
                $this->url = "https://api.getresponse.com/v3/contacts/".$this->userId;

                $options[CURLOPT_URL] = $this->url;
                $state_ch2 = curl_init();
                curl_setopt_array($state_ch2, $options);
                $responseData = curl_exec($state_ch2);

                $tags = TagsParser::parse($responseData);
            }
        }


        return $tags;
    }
}