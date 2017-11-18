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
$get = file_get_contents('user.txt');
$ex = explode("\n",$get);
$bc = explode("/bc", $text);

if($bc){
for($i = 0;$i < count($ex); $i++){
bot('sendMessage',[
'chat_id'=>$ex[$i],
'text'=>$bc[1]
]);
}
}
