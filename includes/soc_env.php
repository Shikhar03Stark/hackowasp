<?php
    require 'connectdb.php';
    echo "
    <div class = 'tile'>
        <form name = 'requestSvr' method='post' action = 'includes/requestSvr.php'>
            <input type = 'submit' name = 'mypost' value = 'Show My Posts'>&nbsp;
            <input type = 'submit' name = 'createnpost' value = 'Create New Post'>&nbsp;
            <input type = 'submit' name = 'details' value = 'EDIT Details'>&nbsp;
            <input type = 'submit' name = 'logout' value = 'LOGOUT'>
        </form>
    </div>
    ";
    if(!isset($_GET['query'])){
    echo "
    <div class = 'l_tile'>
        Logged in as ". $_SESSION['username'].",<br>on behalf of ".$_SESSION['name']."
    </div>
    ";
    }
    else{
        if($_GET['query'] == "mypost"){
            require 'showposts.php';
        }
        elseif($_GET['query'] == "createnpost"){
            require 'createnpost.php';
        }
        elseif ($_GET['query'] == "details") {
            require 'soc_details.php';
        }
        elseif ($_GET['query'] == "logout") {
            header("Location: http://localhost/hackathon(hackowasp2.0)/society.php");
        }
    }
 ?>
