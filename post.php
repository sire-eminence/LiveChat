<?php
require_once($_SERVER['DOCUMENT_ROOT']."/livechat/session.php");

if(isset($_SESSION['name'])){
    $text = $_POST['msg'];

    if(empty(trim($text)) || trim($text) == ""){
        echo "Enter a message.";
    }
    else{
        try{
            $cb = fopen("log.txt", 'a');
            fwrite($cb, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."</div>");
            fclose($cb);
        }
        catch(Exception $e){
            echo "An error occured. Please try again.";
        }
    }
}
?>