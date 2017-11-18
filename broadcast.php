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
$chat_id = $message->chat->id;
$text = $message->text;
$bc = explode(" ",$text);
$im = implode("",$bc);

if($text != in_array($text, $bc)){

$db_get = mysqli_query($db, "SELECT * FROM users");

while($get_db = mysqli_fetch_assoc($db_get)){

bot('sendMessage',[
'chat_id'=>$get_db['id'],
'text'=>$im
]);

}
}
