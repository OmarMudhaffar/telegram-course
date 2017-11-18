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
$file_sticker = file_get_contents("tg/sticker.txt");
$ex_sticker = explode("\n", $file_sticker);
$file_photo = file_get_contents("tg/photo.txt");
$ex_photo = explode("\n", $file_photo);
$file_fwd = file_get_contents("tg/fwd.txt");
$ex_fwd = explode("\n", $file_fwd);
$file_link = file_get_contents("tg/link.txt");
$ex_link = explode("\n", $file_link);
$file_voice = file_get_contents("tg/voice.txt");
$ex_voice = explode("\n", $file_voice);
$file_audio = file_get_contents("tg/audio.txt");
$ex_audio = explode("\n", $file_audio);
$file_gif = file_get_contents("tg/gif.txt");
$ex_gif = explode("\n", $file_gif);
if($text == "اقفل الملصقات"  && !in_array($chat_id, $ex_sticker)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الملصقات 🗾🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/sticker.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الملصقات"  && in_array($chat_id, $ex_sticker)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الملصقات مقفولة 🗾🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الملصقات" && in_array($chat_id, $ex_sticker)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم فتح الملصقات 🗾🔓",
'reply_to_message_id'=>$message->message_id,
]);
$o = file_get_contents('tg/sticker.txt');
$o = str_replace("$chat_id",'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/sticker.txt', $o);
}
if($text == "افتح الملصقات" && !in_array($chat_id, $ex_sticker)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الملصقات مفتوحة 🗾🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل الصور"  && !in_array($chat_id, $ex_photo)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الصور 📷🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/photo.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الصور"  && in_array($chat_id, $ex_photo)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الصور مقفولة 📷🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الصور"  && in_array($chat_id, $ex_photo)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم فتح الصور 📷🔓",
'reply_to_message_id'=>$message->message_id,
]);
$o = file_get_contents('tg/photo.txt');
$o = str_replace("$chat_id",'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/photo.txt', $o);
}
if($text == "افتح الصور" && !in_array($chat_id, $ex_photo)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الصور مفتوحة 📷🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل التوجيه"  && !in_array($chat_id, $ex_fwd)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل التوجيه 🔄🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/fwd.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل التوجيه"  && in_array($chat_id, $ex_fwd)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"التوجيه مقفول 🔄🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح التوجيه"  && in_array($chat_id, $ex_fwd)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم فتح التوجيه 🔄🔓",
'reply_to_message_id'=>$message->message_id,
]);
$o = file_get_contents('tg/photo.txt');
$o = str_replace("$chat_id",'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/fwd.txt', $o);
}
if($text == "افتح التوجيه"  && !in_array($chat_id, $ex_fwd)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"التوجيه مفتوح 🔄🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل الروابط"  && !in_array($chat_id, $ex_link)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الروابط 💎🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/link.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الروابط"  && in_array($chat_id, $ex_link)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الروابط مقفولة 💎🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الروابط"  && in_array($chat_id, $ex_link)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم فتح الروابط 💎🔓",
'reply_to_message_id'=>$message->message_id,
]);
$o = file_get_contents('tg/link.txt');
$o = str_replace("$chat_id",'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/link.txt', $o);
}
if($text == "افتح الروابط"  && !in_array($chat_id, $ex_link)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الروابط مفتوحة 💎🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل الصوتيات"  && !in_array($chat_id, $ex_voice)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الصوتيات  🎙🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/voice.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الصوتيات"  && in_array($chat_id, $ex_voice)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الصوتيات  مقفولة 🎙🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الصوتيات"  && in_array($chat_id, $ex_voice)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم فتح الصوتيات  🎙🔓",
'reply_to_message_id'=>$message->message_id,
]);
$o = file_get_contents('tg/voice.txt');
$o = str_replace("$chat_id",'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/voice.txt', $o);
}
if($text == "افتح الصوتيات"  && !in_array($chat_id, $ex_voice)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الصوتيات  مفتوحة 🎙🔓",
'reply_to_message_id'=>$message->message_id,
]);
}


if($text == "اقفل الاغاني"  && !in_array($chat_id, $ex_audio)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الاغاني  🎵🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/audio.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الاغاني"  && in_array($chat_id, $ex_audio)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الاغاني  مقفولة 🎵🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الاغاني"  && in_array($chat_id, $ex_audio)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم فتح الاغاني  🎵🔓",
'reply_to_message_id'=>$message->message_id,
]);
$o = file_get_contents('tg/audio.txt');
$o = str_replace("$chat_id",'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/audio.txt', $o);
}
if($text == "افتح الاغاني"  && !in_array($chat_id, $ex_audio)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الاغاني  مفتوحة 🎵🔓",
'reply_to_message_id'=>$message->message_id,
]);
}


if($text == "اقفل الصور المتحركة"  && !in_array($chat_id, $ex_gif)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الصور المتحركة  🎆🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/gif.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الصور المتحركة"  && in_array($chat_id, $ex_gif)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الصور المتحركة  مقفولة 🎆🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الصور المتحركة"  && in_array($chat_id, $ex_gif)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم فتح الصور المتحركة  🎆🔓",
'reply_to_message_id'=>$message->message_id,
]);
$o = file_get_contents('tg/gif.txt');
$o = str_replace("$chat_id",'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/gif.txt', $o);
}
if($text == "افتح الصور المتحركة"  && !in_array($chat_id, $ex_gif)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الصور المتحركة  مفتوحة 🎆🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
