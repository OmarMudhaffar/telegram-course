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
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$inch = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_id&user_id=".$from_id);
$bot_memb = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chat_id&user_id=388576178");
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
$file_cont = file_get_contents("tg/cont.txt");
$ex_cont = explode("\n", $file_cont);
$file_list = file_get_contents("tg/list.txt");
$ex_list = explode("\n", $file_list);
$admins = array(117331455, 325384922);
$bot_id = 388576178;
$linkss = array("https" , "http" , "t.me" , "telegram.me");
$file_join = file_get_contents("tg/join.txt");
$ex_join = explode("\n", $file_join);
$file_chat = file_get_contents("tg/chat.txt");
$ex_chat = explode("\n", $file_chat);
$file_silent = file_get_contents("tg/silent.txt");
$ex_silent = explode("\n", $file_silent);
bot('answerInlineQuery',[
        'inline_query_id'=>$update->inline_query->id,    
        'results' => json_encode([[
            'type'=>'article',
            'id'=>base64_encode(rand(5,555)),
            'title'=>'مشاركة مع اصدقائك',
            'input_message_content'=>['parse_mode'=>'HTML','message_text'=>"اهلا بك عزيزي 🚹 في البوت الرسمي 🔶\nالخاص لحماية المجموعات 👥🔒\nيعمل بل لغة العربية 📕 ويحتوي \nعلى جميع الاشياء التي تحتاجها 💎\nلعمل مجموعة امنة وجيدة ‼️"],
            'reply_markup'=>['inline_keyboard'=>[
                [
                ['text'=>'للدخول الى البوت اضغط هنا ♻️','url'=>'https://telegram.me/TeleDel_Bot']
                ],
             ]]
        ]])
    ]);
if($text == "اقفل الملصقات" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_sticker)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الملصقات 🗾🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/sticker.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الملصقات" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_sticker)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الملصقات مقفولة 🗾🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الملصقات" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_sticker)){
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
if($text == "افتح الملصقات" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_sticker)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الملصقات مفتوحة 🗾🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل الصور" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_photo)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الصور 📷🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/photo.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الصور" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_photo)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الصور مقفولة 📷🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الصور" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_photo)){
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
if($text == "افتح الصور" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_photo)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الصور مفتوحة 📷🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل التوجيه" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_fwd)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل التوجيه 🔄🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/fwd.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل التوجيه" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_fwd)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"التوجيه مقفول 🔄🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح التوجيه" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_fwd)){
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
if($text == "افتح التوجيه" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_fwd)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"التوجيه مفتوح 🔄🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل الدردشة" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_chat)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الدردشة 📧🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/chat.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الدردشة" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_chat)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الدردشة مقفول 📧🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "كتم" && $message->reply_to_message && strpos($inch , '"status":"member"') == false && !in_array($message->reply_to_message->from->id, $ex_silent)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ✅ كتم العضو 👤🔕",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/silent.txt', "\n" . $message->reply_to_message->from->id, FILE_APPEND);
}
if($text == "كتم" && strpos($inch , '"status":"member"') == false && in_array($message->reply_to_message->from->id, $ex_silent)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"العضو مكتوم 👤🔕",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الكتم" && strpos($inch , '"status":"member"') == false && in_array($message->reply_to_message->from->id, $ex_silent)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم فتح الكتم 📧🔓",
'reply_to_message_id'=>$message->message_id,
]);
$o = file_get_contents('tg/silent.txt');
$o = str_replace($message->reply_to_message->from->id,'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/silent.txt', $o);
}
if($text == "افتح الكتم" && strpos($inch , '"status":"member"') == false && !in_array($message->reply_to_message->from->id, $ex_silent)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الكتم مفتوح 📧🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الدردشة" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_chat)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم فتح الدردشة 📧🔓",
'reply_to_message_id'=>$message->message_id,
]);
$o = file_get_contents('tg/chat.txt');
$o = str_replace("$chat_id",'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/chat.txt', $o);
}
if($text == "افتح الدردشة" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_chat)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الدردشة مفتوح 📧🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل الروابط" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_link)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الروابط 💎🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/link.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الروابط" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_link)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الروابط مقفولة 💎🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الروابط" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_link)){
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
if($text == "افتح الروابط" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_link)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الروابط مفتوحة 💎🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل الاشعارات" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_join)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ✅ قفل اشعارات الدخول والخروج 📛🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/join.txt', "\n" . $chat_id, FILE_APPEND);
}	
if($text == "اقفل الاشعارات" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_join)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الاشعارات مقفول 📛🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الاشعارات" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_join)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم فتح الاشعارات 📛🔓",
'reply_to_message_id'=>$message->message_id,
]);
$o = file_get_contents('tg/photo.txt');
$o = str_replace("$chat_id",'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/join.txt', $o);
}
if($text == "افتح الاشعارات" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_join)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الاشعارات مفتوح 📛🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل الصوتيات" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_voice)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الصوتيات  🎙🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/voice.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الصوتيات" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_voice)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الصوتيات  مقفولة 🎙🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الصوتيات" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_voice)){
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
if($text == "افتح الصوتيات" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_voice)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الصوتيات  مفتوحة 🎙🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل الاغاني" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_audio)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الاغاني  🎵🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/audio.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الاغاني" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_audio)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الاغاني  مقفولة 🎵🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الاغاني" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_audio)){
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
if($text == "افتح الاغاني" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_audio)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الاغاني  مفتوحة 🎵🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل الصور المتحركة" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_gif)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الصور المتحركة  🎆🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/gif.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الصور المتحركة" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_gif)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الصور المتحركة  مقفولة 🎆🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الصور المتحركة" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_gif)){
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
if($text == "افتح الصور المتحركة" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_gif)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الصور المتحركة  مفتوحة 🎆🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل جهات الاتصال" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_cont)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل جهات الاتصال  📱🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/cont.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل جهات الاتصال" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_cont)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"جهات الاتصال  مقفولة 📱🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح جهات الاتصال" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_cont)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم فتح جهات الاتصال  📱🔓",
'reply_to_message_id'=>$message->message_id,
]);
$o = file_get_contents('tg/cont.txt');
$o = str_replace("$chat_id",'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/cont.txt', $o);
}
if($text == "افتح جهات الاتصال" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_cont)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"جهات الاتصال  مفتوحة 📱🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "اقفل الكلايش" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_list)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم قفل الكلايش  🗒🔒",
'reply_to_message_id'=>$message->message_id,
]);
file_put_contents('tg/list.txt', "\n" . $chat_id, FILE_APPEND);
}
if($text == "اقفل الكلايش" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_list)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الكلايش  مقفولة 🗒🔒",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "افتح الكلايش" && strpos($inch , '"status":"member"') == false && in_array($chat_id, $ex_list)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم فتح الكلايش  🗒🔓",
'reply_to_message_id'=>$message->message_id,
]);
$o = file_get_contents('tg/list.txt');
$o = str_replace("$chat_id",'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/list.txt', $o);
}
if($text == "افتح الكلايش" && strpos($inch , '"status":"member"') == false && !in_array($chat_id, $ex_list)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"الكلايش  مفتوحة 🗒🔓",
'reply_to_message_id'=>$message->message_id,
]);
}
if($message->sticker && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_sticker)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if(preg_match('/^([Hh]ttp|[Hh]ttps|t.me)(.*)/',$text) or preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)/',$text) or preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)/',$text) or preg_match($text,'/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)/') && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_link)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if(preg_match('/^([Hh]ttp|[Hh]ttps|t.me)(.*)/',$text) or preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)/',$text) && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_link)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
$olink = explode("\n", $text);
$olink2 = explode(" ", $text);
if(in_array("t.me", $olink) && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_link)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if(in_array("t.me", $olink2) && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_link)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if($message->photo && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_photo)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if($message->voice && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_voice)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if($message->audio && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_audio)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if($message->forward_from-id && !$message->photo && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_fwd)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if($message->text && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_chat)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if($message->text && strpos($inch , '"status":"member"') !== false && in_array($from_id, $ex_silent)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if($message->new_chat_member && in_array($chat_id, $ex_join) or $message->left_chat_member && in_array($chat_id, $ex_join)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id,
]);
}
if($fwdd && !$message->photo && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_fwd)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if(str_word_count($text) > 70 && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_list)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if($message->contact && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_cont)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if($message->document && strpos($inch , '"status":"member"') !== false && in_array($chat_id, $ex_cont)){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
if($message->reply_to_message && $text == "طرد"  && $message->reply_to_message->from->id != $bot_id && strpos($inch , '"status":"member"') == false){
bot('kickChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$message->reply_to_message->from->id,
'reply_to_message_id'=>$message->reply_to_message->from->id
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'تم ✅ طرد العضو 🚹🔻',
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>$message->reply_to_message->from->first_name, 'url'=>"https://telegram.me/".$message->reply_to_message->from->username]
]
]
])
]);
}
if($message->reply_to_message->from->id == $bot_id && $text == "طرد" && strpos($inch , '"status":"member"')  == false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'لا يمكنك ➖❕ طردي هكذا ‼️',
'reply_to_message_id'=>$message->message_id,
]);
}
if($message->reply_to_message && $text == "الغاء الحضر" && strpos($inch , '"status":"member"') == false){
bot('unbanChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$message->reply_to_message->from->id,
'reply_to_message_id'=>$message->reply_to_message->from->id
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'تم ✅ الغاء الحضر عن العضو 🚹🔻',
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>$message->reply_to_message->from->first_name, 'url'=>"https://telegram.me/".$message->reply_to_message->from->username]
]
]
])
]);
}
if($text == "معلومات" && !$message->reply_to_message){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💭الاسم : " . $message->from->first_name . 
"\n💭المعرف : @" . $message->from->username . 
"\n💭الايدي : " . $message->from->id . 
"\n💭اسم المجموعة : " . $message->chat->title . 
"\n💭ايدي المجموعة : " . $message->chat->id,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'تابع جديدنا 📪', 'callback_data'=>"channel"]
],
]
])
]);
}
if($data=="channel"){
   bot('editMessageText',[
   'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'تابعنا عبر الروابط للتالية 📩',
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'REAL BUSINESS 📚', 'url'=>"https://telegram.me/set_web"]
        ],
        [
        ['text'=>'فريق لمسة 💡', 'url'=>"https://telegram.me/touch_t"]
        ],
]
])
]);
}
if($text == "/start" && $message->chat->type == "private"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك عزيزي 🚹 في البوت الرسمي 🔶\nالخاص لحماية المجموعات 👥🔒\nيعمل بل لغة العربية 📕 ويحتوي \nعلى جميع الاشياء التي تحتاجها 💎\nلعمل مجموعة امنة وجيدة ‼️",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'تابع جديدنا 📪', 'callback_data'=>"channel2"]
],
[
['text'=>'اضفني الى مجموعتك 🚹➕', 'url'=>"https://telegram.me/TeleDel_Bot?startgroup="]
],
[
['text'=>'شارك البوت 🤖🍁', 'switch_inline_query'=>""]
],
[
['text'=>"هل لديك سؤال ❔ ","url"=>"https://telegram.me/TeIeSupport_Bot"]
]
]
])
]);
}
$real = file_get_contents("tg/start.txt");
$ex_real = explode("\n", $real);
if($text && $message->chat->type == "supergroup" && !in_array($chat_id, $ex_real)){
file_put_contents("tg/start.txt","\n" . $chat_id, FILE_APPEND);
}
if($text && $message->chat->type == "private" && !in_array($from_id, $ex_real)){
file_put_contents("tg/start.txt", "\n" . $message->from->id, FILE_APPEND);
}
if($data=="channel2"){
   bot('editMessageText',[
   'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>'تابعنا عبر الروابط للتالية 📩',
   'reply_markup'=>json_encode([
'inline_keyboard'=>[
        [
          ['text'=>'REAL BUSINESS 📚', 'url'=>"https://telegram.me/set_web"]
        ],
        [
        ['text'=>'فريق لمسة 💡', 'url'=>"https://telegram.me/touch_t"]
        ],
         [
        ['text'=>'عودة 🏠 ', 'callback_data'=>"home"]
        ],
]
])
]);
}
if($data=="home"){
   bot('editMessageText',[
   'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
 'text'=>"اهلا بك عزيزي 🚹 في البوت الرسمي 🔶\nالخاص لحماية المجموعات 👥🔒\nيعمل بل لغة العربية 📕 ويحتوي \nعلى جميع الاشياء التي تحتاجها 💎\nلعمل مجموعة امنة وجيدة ‼️",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'تابع جديدنا 📪', 'callback_data'=>"channel2"]
],
[
['text'=>'اضفني الى مجموعتك 🚹➕', 'url'=>"https://telegram.me/TeleDel_Bot?startgroup=start"]
],
[
['text'=>'شارك البوب 🤖🍁', 'switch_inline_query'=>""]
],
[
['text'=>"هل لديك سؤال ❔ ","url"=>"https://telegram.me/TeIeSupport_Bot"]
]
]
])
]);
}
if($message->reply_to_message && $text == "معلومات"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"💭الايدي : " . $message->reply_to_message->from->id . "\n💭اليوزر : @" . $message->reply_to_message->from->username,
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "غادر" && in_array($from_id, $admins)){
bot('kickChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$bot_id
]);
}
$bc = explode("/bc", $text);
if($bc && in_array($from_id, $admins)){
$real = file_get_contents("tg/start.txt");
$ex_real = explode("\n", $real);
for($y=0;$y<count($ex_real); $y++){
bot('sendMessage', [
'chat_id' => $ex_real[$y],
'text' => $bc[1]
]);
}
}
$time = time() + (979 * 11 + 1 + 30);
if($text == "الوقت"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🕛 البلد : العراق" . "\n" . "🕛 الساعة : " . date('g', $time) . "\n" . "🕛 الدقيقة : " . date('i', $time),
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "التاريخ"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"📆 البلد : العراق \n" . "📆  السنة : " . date("Y") . "\n" . "📆 الشهر : " . date("n") . "\n" . "📆 اليوم :" . date("j"),
'reply_to_message_id'=>$message->message_id
]);
}
if($text == "مساعدة"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"كيفية استخدام البوت 📋🔻",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اوامر القفل ✅", "callback_data"=>"close"]
],
[
["text"=>"اوامر الفتح ❌", "callback_data"=>"open"]
],
[
["text"=>"اوامر عامة 🗒", "callback_data"=>"offc"]
],
[
['text'=>"اصدر البوت بتاريخ 📅 2017/5/11 ☘", "callback_data"=>"omar"]
]
]
])
]);
}
if($data == "close"){
bot('editMessageText', [
'chat_id'=>$chat_id2,
'text'=>"اوامر القفل في المجموعة 👥🔒",
'message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اوامر القفل 🔒", "callback_data"=>"omar"]
],
[
['text'=>'الروابط', 'callback_data'=>"omar"],
['text'=>'اقفل', 'callback_data'=>"omar"]
],
[
['text'=>'التوجيه', 'callback_data'=>"omar"],
['text'=>'اقفل', 'callback_data'=>"omar"]
],
[
['text'=>'الملصقات', 'callback_data'=>"omar"],
['text'=>'اقفل', 'callback_data'=>"omar"]
],
[
['text'=>'الكلايش', 'callback_data'=>"omar"],
['text'=>'اقفل', 'callback_data'=>"omar"]
],
[
['text'=>'الصور', 'callback_data'=>"omar"],
['text'=>'اقفل', 'callback_data'=>"omar"]
],
[
['text'=>'الصوتيات', 'callback_data'=>"omar"],
['text'=>'اقفل', 'callback_data'=>"omar"]
],
[
['text'=>'الاغاني', 'callback_data'=>"omar"],
['text'=>'اقفل', 'callback_data'=>"omar"]
],
[
['text'=>'جهات الاتصال', 'callback_data'=>"omar"],
['text'=>'اقفل', 'callback_data'=>"omar"]
],
[
['text'=>'الاشعارات', 'callback_data'=>"omar"],
['text'=>'اقفل', 'callback_data'=>"omar"]
],
[
['text'=>'الدردشة', 'callback_data'=>"omar"],
['text'=>'اقفل', 'callback_data'=>"omar"]
],
[
['text'=>"عودة 🔙 ", 'callback_data'=>"help"]
]
]
])
]);
}
if($data == "open"){
bot('editMessageText', [
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"اوامر الفتح في المجموعة 👥🔓",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اوامر الفتح 🔒", "callback_data"=>"omar"]
],
[
['text'=>'الروابط', 'callback_data'=>"omar"],
['text'=>'افتح', 'callback_data'=>"omar"]
],
[
['text'=>'التوجيه', 'callback_data'=>"omar"],
['text'=>'افتح', 'callback_data'=>"omar"]
],
[
['text'=>'الملصقات', 'callback_data'=>"omar"],
['text'=>'افتح', 'callback_data'=>"omar"]
],
[
['text'=>'الكلايش', 'callback_data'=>"omar"],
['text'=>'افتح', 'callback_data'=>"omar"]
],
[
['text'=>'الصور', 'callback_data'=>"omar"],
['text'=>'افتح', 'callback_data'=>"omar"]
],
[
['text'=>'الصوتيات', 'callback_data'=>"omar"],
['text'=>'افتح', 'callback_data'=>"omar"]
],
[
['text'=>'الاغاني', 'callback_data'=>"omar"],
['text'=>'افتح', 'callback_data'=>"omar"]
],
[
['text'=>'الاشعارات', 'callback_data'=>"omar"],
['text'=>'افتح', 'callback_data'=>"omar"]
],
[
['text'=>'جهات الاتصال', 'callback_data'=>"omar"],
['text'=>'افتح', 'callback_data'=>"omar"]
],
[
['text'=>'الدردشة', 'callback_data'=>"omar"],
['text'=>'افتح', 'callback_data'=>"omar"]
],
[
['text'=>"عودة 🔙 ", 'callback_data'=>"help"]
]
]
])
]);
}
if($data == "help"){
bot('editMessageText', [
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"كيفية استخدام البوت 📋🔻",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"اوامر القفل ✅", "callback_data"=>"close"]
],
[
["text"=>"اوامر الفتح ❌", "callback_data"=>"open"]
],
[
["text"=>"اوامر عامة 🗒", "callback_data"=>"offc"]
]
]
])
]);
}
if($data == "offc"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"الاوامر العامة في المجموعة ‼️🔻",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"الوصف 🔻","callback_data"=>"omar" ],
['text'=>"الامر 🔻","callback_data"=>"omar" ]
],
[
['text'=>"لطرد العضو بلرد","callback_data"=>"omar" ],
['text'=>"طرد","callback_data"=>"omar" ]
],
[
['text'=>"لكتم عضو","callback_data"=>"omar" ],
['text'=>"كتم","callback_data"=>"omar" ]
],
[
['text'=>"لازالة الكتم","callback_data"=>"omar" ],
['text'=>"الغاء الكتم","callback_data"=>"omar" ]
],
[
['text'=>"للمغادرة من المجموعة","callback_data"=>"omar" ],
['text'=>"مغادرة","callback_data"=>"omar" ]
],
[
['text'=>"لاضهار معلوماتك","callback_data"=>"omar" ],
['text'=>"معلومات","callback_data"=>"omar" ]
],
[
['text'=>"بلرد على عضو","callback_data"=>"omar" ],
['text'=>"معلومات","callback_data"=>"omar" ]
],
[
['text'=>"لالغاء حضر بلرد","callback_data"=>"omar" ],
['text'=>'الغاء الحضر', "callback_data"=>"omar" ]
],
[
['text'=>"لعرض الوقت","callback_data"=>"omar"],
['text'=>"الوقت", "callback_data"=>"omar"]
],
[
['text'=>"لعرض التاريخ","callback_data"=>"omar"],
['text'=>"التاريخ","callback_data"=>"omar"]
],
[
['text'=>"عدد رسائل المجموعة","callback_data"=>"omar" ],
['text'=>"عدد الرسائل","callback_data"=>"omar" ]
],
[
['text'=>"عودة 🔙 ", 'callback_data'=>"help"]
]
]
])
]);
}
if($text == "عدد الرسائل" && $message->message_id > 1000 && $message->chat->type == "supergroup"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عدد 📈 رسائل المجموعة 👥🔹  : " . "*$message->message_id*" . "\nتهانيا 💡 مجموعتك متفاعلة 💯 ",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>'Markdown'
]);   
}
if($text == "عدد الرسائل" && $message->message_id < 1000 && $message->chat->type == "supergroup"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عدد 📈 رسائل المجموعة 👥🔹  : " . "*$message->message_id*" . "\nللاسف❗️مجموعتك غير متفاعلة 🚹💭",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>'Markdown'
]);   
}
$ban = explode(" ", $text);
if($ban[0] == "حضر" && $ban[1] == "عام" && $ban[2] == $text && in_array($from_id, $admins)){
file_put_contents("tg/banall.txt", "\n" . $ban[2]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"العضو 🚹 : " . $ban[2] . "\nتم ✅ حضره عام ‼️",
'reply_to_message_id'=>$message->message_id,
]);
} 
if($message->reply_to_message && $text == "حضر عام" && in_array($from_id, $admins)){
file_put_contents('tg/banall.txt', "\n" . $message->reply_to_message->from->id, FILE_APPEND);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"العضو 🚹 : @" . $message->reply_to_message->from->username . "\nتم ✅ حضره عام ‼️ "
]);
}
$get_ban = file_get_contents('tg/banall.txt');
$ex_ban = explode("\n", $get_ban);
if($text && in_array($from_id, $ex_ban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"انت محضور عام من البوت ‼️\nيبدو انك اسئت الاستخدام 🤖❕\nتنبيه للجميع سيتم حضرك 💎\nاذا اسأت الاستخدام 💡 نرجو منكم \nعدم ❌ الاسائة داخل المجموعات التي يتواجد فيها البوت 🤖❄️",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"راسل 📬 الدعم لازالة الحضر ‼️", "url"=>"https://telegram.me/TeIeSupport_Bot"]
]
]
])
]);
bot('kickChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$message->from->id
]);
}
if($message->reply_to_message && $text == "الغاء العام" && in_array($from_id, $admins)){
$o = file_get_contents('banall.txt');
$o = str_replace($ban[2],'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/banall.txt', $o);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"العضو 🚹 : @" . $message->reply_to_message->from->username . "\nتم ✅ الغاء حضره من عام ‼️ "
]);
}
if($ban[0] == "الغاء" && $ban[1] == "العام" && $ban[2] == $text && in_array($from_id, $admins)){
$o = file_get_contents('banall.txt');
$o = str_replace($message->reply_to_message->from->id,'',$o);
$o = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $o);
file_put_contents('tg/banall.txt', $o);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"العضو 🚹 : @" . $message->reply_to_message->from->username . "\nتم ✅ الغاء حضره من عام ‼️ "
]);
}
if($text == "مغادرة" && strpos($inch , '"status":"member"') !== false && $message->chat->type == "supergroup"){
bot('kickChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$message->from->id
]);
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"وداعا عزيزي ✨",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "مغادرة" && strpos($inch , '"status":"member"') == false && $message->chat->type == "supergroup"){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>'عذرا ‼️ انت مشرف في المجموعة 🚹🔒',
'reply_to_message_id'=>$message->message_id,
]);
}
if($text && strpos($bot_memb , '"status":"member"') !== false && $message->chat->type == "supergroup" && strpos($inch , '"status":"creator"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عذرا ‼️ انا لست مشرف في المجموعة ✅\nلا يمكنني العمل الان 🔧 الرجاء قم بترقيتي مشرف في المجموعة 👥\nوبعدها ارسل 📧 مساعدة",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'تابع جديدنا 📪', 'callback_data'=>"channel"]
],
]
])
]);
}
if($text == "غادر المجموعة"  && strpos($inch , '"status":"creator"') !== false){
bot('kickChatMember',[
'chat_id'=>$chat_id,
'user_id'=>$bot_id,
]);
}
if($text == "غادر المجموعة"  && strpos($inch , '"status":"creator"') == false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'عذرا ‼️ فقط منشئ المجموعة 👥 يمكنه استخدام هاذا الامر ♻️🔺',
'reply_to_message_id'=>$message->message_id
]);
}
if($text == "/start" && $message->chat->type == "supergroup"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك ☘ ارسل مساعدة لمعرفة 💎 كيفية استخدام البوت 🤖🍁",
'reply_to_message_id'=>$message->message_id
]);
}
