<?php
    if(!isset($_POST['signup_btn'])){
        header("Location: http://localhost/hackathon(hackowasp2.0)/society.php");
        exit();
    }
    require 'connectdb.php';

    $soc_name = $_POST['soc_name'];
    $soc_username = $_POST['soc_username'];
    $pwd = $_POST['soc_pass'];
    $repwd = $_POST['soc_repass'];
    $code = $_POST['soc_code'];

    if(empty($soc_name) || empty($soc_username) || empty($pwd) || empty($repwd) || empty($code)){
        header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=empty");
        exit();
    }
    elseif($pwd != $repwd){
        header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=notmatch&usrnm=".$soc_username."&nm=".$soc_name);
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
     header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=invldusrnm&nm=".$soc_name);
     exit();
    }
    //prepared statement for checking same username
    $sql = "SELECT username FROM society WHERE username= ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=dberr1");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "s", $soc_username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
     if($resultCheck > 0){
          header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=usernmtaken&nm=".$soc_name);
          exit();
     }
    }
     //prepared statement for checking same code
     $sql = "SELECT username FROM society WHERE verifycode= ?";
     $stmt = mysqli_stmt_init($conn);
     if(!mysqli_stmt_prepare($stmt, $sql)){
         header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=dberr2");
         exit();
     }else{
         mysqli_stmt_bind_param($stmt, "i", $code);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
      if($resultCheck > 0){
           header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=codeexist&nm=".$soc_name."&usrnm=".$soc_username);
           exit();
      }
    }

    //insertion of data to db
    $sql = "INSERT INTO society (name, username, password, verifycode) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=dberr3");
        exit();
    }
    else{
     //hash passwords
        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssi", $soc_name, $soc_username, $hashedpwd, $code);
        mysqli_stmt_execute($stmt);
        header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?login=success");
        exit();
    }
    mysqli_close($conn);
 ?>
