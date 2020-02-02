<?php session_start() ?>
<!DOCTYPE>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="assets.css">
    <title> Society Login</title>
    <meta charset="utf-8">
</head>
<body>
    <div class = "sidebar">
        <div class = "header">
        <a href="society.php">
        <img src = "Interact_logo.png" width = "100"></a>
        </div>
        <img src = "sidebar.png">
    </div>
    <div class = "main">
    <div class = "header">
        <span class = "logo"><b> CLUBHOST </b></span>
        <?php
        if(!isset($_SESSION['name'])){
            echo "<span class = 'heading'>SOCIETY PAGE</span>";
        }
        else{
            echo "<span class = 'heading'>".$_SESSION['name']."</span>";
        }
        ?>
    </div>
    <div class = "content">
        <?php require 'includes/fetch_soc.php'; ?>
    </div>
    <div class = "footer">
        <p>Made with &#10084; by word.exe</p>
    </div>
</div>
</body>
</html>
