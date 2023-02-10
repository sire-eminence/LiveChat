<?php
session_name('LiveChat');
session_set_cookie_params(0);
ini_set("session.cookie_httponly", true);
ini_set("session.cookie_secure", true);
error_reporting(0);
header_remove('X-Powered-By');
date_default_timezone_set("Africa/Lagos");
if(session_status() == PHP_SESSION_NONE){
	session_start();
}

session_regenerate_id();
ob_start();
?>
