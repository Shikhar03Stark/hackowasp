<?php
    if(!isset($_POST['log_btn'])){
        header("Location: http://localhost/hackathon(hackowasp2.0)/society.php");
        exit();
    }

    require 'connectdb.php';

    $username = $_POST['username'];
    $pwd = $_POST['password'];

    if(empty($username) || empty($pwd)){
        header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=empty");
        exit();
    }
    $sql = "SELECT * FROM society WHERE username=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=dberr1");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result)){
           //built-in function that hashes the password and returns true if matches with db
           $passwordCheck = password_verify($pwd, $row['password']);
           if(!$passwordCheck){
            header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=wrongpwd");
                exit();
           }
           else{
                //user is verified and ready to be logged in
                session_start();
                $_SESSION['username'] = $row["username"];
                $_SESSION['id'] = $row["postid"];
                $_SESSION['name'] = $row['name'];
                header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?login=true");
                exit();
           }
      }
      else{
           header("Location: http://localhost/Interact/login.php?err=nouser");
           exit();
      }
    }

 ?>
