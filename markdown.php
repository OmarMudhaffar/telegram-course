<?php
// By OmarReal 
// My Channel Set_Web
ob_start();
define('API_KEY','TOKEN');
function bot($method,$datas=[]){
    $url = 'https://api.telegram.org/bot'.API_KEY.'/'.$method;
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

if($text == "link"){
bot('sendMessage',[
'chat_id'=>$chat-id,
'text'=>"[OmarReal](https://t.me.omar_real)",
'parse_mode'=>"markdown"
]);
}

if($text == "bold"){
bot('sendMessage',[
'chat_id'=>$chat-id,
'text'=>"*OmarReal*",
'parse_mode'=>"markdown"
]);
}

if($text == "it"){
bot('sendMessage',[
'chat_id'=>$chat-id,
'text'=>"_OmarReal_",
'parse_mode'=>"markdown"
]);
}
