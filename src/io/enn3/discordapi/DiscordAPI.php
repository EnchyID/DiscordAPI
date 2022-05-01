<?php

namespace io\enn3\discordapi;

class DiscordAPI {

    private $url;
    private $curl_obj;
    private $username;

    public function __construct(string $username, string $token){
        $this->url = "https://discord.com/api/webhooks/" . $token;
        $this->username = $username;
        if(!function_exists("curl_init")){
            exit();
        }
        $this->init();
    }
    
    public function init(){
        $this->curl_obj = curl_init();
    }
    
    public function request($url, $method = "GET", $params = array(), $opts = array()){
        $method = trim(strtoupper($method));
        $opts[CURLOPT_FOLLOWLOCATION] = true;
        $opts[CURLOPT_RETURNTRANSFER] = 1;
        if($method === "GET"){
            $url .= "?" . serialize($params);
            $params = http_build_query($params);
        }else if($method === "POST"){
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $params;
        }
        $opts[CURLOPT_URL] = $url;
        curl_setopt_array($this->curl_obj, $opts);
        $content = curl_exec($this->curl_obj);
        return $content;
    }

    public function sendMessage(string $text){
        $data = array(
            "content" => $text,
            "username" => $this->username
        );
        $result = $this->request($this->url, "POST", $data);
        $query = json_decode($result);
        if($query) print_r($query);
        else echo $result;
    }
}
