<?php
session_start();
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
     if (!$text){
         exit;
     }
    if ($text === "⠀"){
        exit;
    }
    if (strlen($text) < 2){
        //$text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='user-name'>".$_SESSION['name']."</b> <span style='color:red;'>Cannot send short message. please lengthen.</span><br></div>";
        echo "<script> alert('Cannot send short message. Please lengthen.');</script>";
        exit;
    }
    $text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='user-name'>".$_SESSION['name']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
    file_put_contents("log.html", $text_message . "\n", FILE_APPEND | LOCK_EX);
}
?>