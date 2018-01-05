<?php

ob_start();

$API_KEY = ""; // token 
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$url = file_get_contents("https://urlshortreal.herokuapp.com/apishort.php?url=$text");
$json = json_decode($url);

if($text == "/start"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"welcome send your url"
]);
}

if($text != "/start"){
bot("sendMessage",[
'chat_id'=>$chat_id,
'text'=>$json->url
]);
}
