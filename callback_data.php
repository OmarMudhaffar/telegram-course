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

$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;

if($text == '/start'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'OmarReal',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'ClickMe One','callback_data'=>'c1']]
]
])
]);
}

if($data == 'c1'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id=>$message_id,
'text'=>'click done',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'ClickMe Two','callback_data'=>'c2']]
]
])
]);
}


if($data == 'c2'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id=>$message_id,
'text'=>'click done two'
]);
}
