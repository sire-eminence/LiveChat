<?php
require_once($_SERVER['DOCUMENT_ROOT']."/livechat/session.php");
if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
    header("Location: http://localhost/livechat/");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1" />
        <meta name="charset" content="UTF-8" />
	    <meta name="HandheldFriendly" content="true" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>LiveChat</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="chat-card">
            <h1>LiveChat!</h1>
            <p class="wlc">Hi - <span><?=htmlspecialchars($_SESSION['name']);?></span></p>
            <p class="out">Exit Chat</p>

            <section class="msgPane">
            <?php
		        if (file_exists( "log.txt") && filesize("log.txt") > 0){
		            $handle = fopen("log.txt", "r" );
		            $contents = fread($handle, filesize ("log.txt"));
		            fclose($handle);

		            echo $contents;
		        }
	        ?>
            </section>

            <form method="POST" class="msgForm">
                <input type="text" name="msg" class="msg" placeholder="Message" />
                <button class="submit" name="submit">Submit</button>
            </form>
        </div>

        <script type="text/javascript" src="http://localhost/livechat/js/script.js"></script>
    </body>
</html>