<?php 

// By @Omar_Real

$db = mysqli_connect("localhost","user","password","database name");

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
$id = $message->from->id;

if($text == '/start'){

$che = mysqli_query($db, "SELECT * FROM users WHERE id = '".$id."' ");
$check = mysqli_fetch_assoc($che);

if($id != $check['id']){

mysqli_query($db, "UPDATE count SET users = users + 1);
mysqli_query($db, "INSERT INTO users(id) VALUES('$id')" );

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'welcome'
]);

}

}

if($text == '/count'){

$dbCount = mysqli_query($db, "SELECT * FROM count");

while($getCount = mysqli_fetch_assoc($dbCount)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$getCount['users']
]);
}

}


if($text == '/start'){

$che = mysqli_query($db, "SELECT * FROM users WHERE id = '".$id."' ");
$check = mysqli_fetch_assoc($che);

if($id == $check['id']){

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'hello'
]);

}

}
