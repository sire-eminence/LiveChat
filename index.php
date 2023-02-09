<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/livechat/session.php");
    if(isset($_SESSION['name']) && !empty($_SESSION['name'])){
        header("Location: http://localhost/livechat/chat.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1" />
        <meta name="charset" content="UTF-8" />
	    <meta name="HandheldFriendly" content="true" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Welcome to LiveChat</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="card">
            <h1>Welcome to LiveChat!</h1>

<?php
if(isset($_POST['username'])){
    $username = stripslashes(htmlspecialchars(trim($_POST['username'])));
    $regex = '/[£€÷`@#$%^&*()+=\,\[\]\';!.\/{}|":<>?~\\\\]/';

    if($username == ""){
        echo '<p class="resp">Please Enter your Username</p>';
    }
    else if(preg_match('/\s/', $username)){
        echo '<p class="resp">Spaces are not allowed in the username.</p>';
    }
    else if(preg_match($regex, $username)){
        echo '<p class="resp">Special characters are not allowed in the username.</p>';
    }
    else{
        $_SESSION['name'] = $username;

        try{
            $cb = fopen ("log.txt", 'a');
            fwrite ($cb, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has joined the chat session.</i></div>");
            fclose ($cb);
            header("Location: http://localhost/livechat/chat.php");
        }
        catch(Exception $e){
            echo "Error in logging in user. Please try again.";
        }
    } 
}
?>

            <p>Enter your username to proceed to chat.</p>
            <form method="POST">
                <input type="text" class="username" name="username" placeholder="Username" />
                <button class="submit" name="submit">Submit</button>
            </form>
        </div>
    </body>
</html>