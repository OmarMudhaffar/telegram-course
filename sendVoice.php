<?php 

ob_start();
$API_KEY = 'BOT_TOKEN_HERE';
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
$from_id = $message->from->id;
$fwdd = $update->message->forward_from_chat->id;
$chat_id = $message->chat->id;
$text = $message->text;

if($message->voice){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$message->voice->file_id
]);
}

if($text == '/music'){
bot('sendVoice',[
'chat_id'=>$chat_id,
'voice'=>'File_Id' // ايدي البصمة
]);
}
