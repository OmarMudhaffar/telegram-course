<?php 

// By @Omar_Real

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
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$welcome = $message->new_chat_member;
$id = $welcome->id;
$get = file_get_contents("https://api.telegram.org/bot$API_KEY/getUserProfilePhotos?user_id=$id&limit=1");
$json = $json_decode($get);
$photo = $json->result->photos[0][0]->file_id;

if($welcome){
bot('sendPhoto',[
'chat_id'=>$chat_id,
'photo'=>$photo,
'caption'=>'Welcome : @' . $welcome->username,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'Contact Us','url'=>'https://t.me/set_web']]
]
])
]);
}
