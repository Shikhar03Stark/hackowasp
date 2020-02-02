<?php
    if(!isset($_SESSION['username'])){
        header("Location: http://localhost/hackathon(hackowasp2.0)/society.php");
        exit();
    }
    else{
        echo "
        <form name = 'post_in' action = 'includes/upload_post.php' method='post'>
        <input type = 'text' id = 'post' placeholder='Title' name = 'title'><br><br>
        <textarea name = 'content' id = 'post' row = '8' cols = '60'>Event Details...
        </textarea>
        <br><br>
        <input type = 'submit' value = 'Upload POST' name = 'upld_btn'>
        </form>
        ";
    }

 ?>
