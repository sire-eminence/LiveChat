<?php
require_once($_SERVER['DOCUMENT_ROOT']."/livechat/session.php");

if(isset($_SESSION['name']) && !empty($_SESSION['name'])){
	try{
		$cb = fopen ("log.txt", 'a');
    	fwrite ($cb, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has left the chat session.</i><br></div>");
  	  	fclose ($cb);
	}
	catch(Exception $e){
		echo "An error occured.";
	}
}

if (ini_get("session.use_cookies")){
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

session_destroy();

header("Location: http://localhost/livechat/");
?>