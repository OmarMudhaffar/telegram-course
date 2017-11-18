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
$chat_id = $message->chat->id;
$text = $message->text;
$channel = "@Set_Web"; // معرف قناتك
$ch = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channel&user_id=$from_id");

if (strpos($ch , '"status":"left"') !== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'parse_mode'=>'Markdown',
'text'=>"المعذرة ❌ يجب عليك الاشتراك 🚹✨ في هاذه القنوات لكي يمكنك استخدام البوت 📢",
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'📚 REAL 💎 BUSINESS ®', 'url'=>"https://telegram.me/set_web"]
        ]
]

])
]);
}
