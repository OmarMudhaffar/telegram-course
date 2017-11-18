<?php

// By @Omar_Real 
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
$message_id = $message->message_id;
$id = $message->from->id;
$get = file_get_contents('file.txt');
$ex = explode("\n",$get);
$count = count($ex);

if($text == '/start' and !in_array($id, $ex)){
file_put_contents('file.txt',"\n" . $id, FILE_APPEND);
}


if($text == '/count'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$count,
'reply_to_message_id'=>$message_id
]);
}
