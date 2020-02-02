<?php
if(isset($_POST['upld_btn'])){
     $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
     $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
     if(empty($_POST['title']) || empty($_POST['content'])){
          header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=empty");
          exit();
     }
     elseif(strlen($title) > 50){
          header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=longtitle");
          exit();
     }
     elseif(strlen($content) > 140){
          header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=longcontent");
          exit();
     }

     require 'connectdb.php';

     $sql = "INSERT INTO posts (postid, title, content, author, dop, haveimg) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP(), 0)";
     $stmt = mysqli_stmt_init($conn);
     if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?err=dberr");
          exit();
     }
     else{
          session_start();
          mysqli_stmt_bind_param($stmt, "isss", $_SESSION['id'], $title, $content, $_SESSION['username']);
          mysqli_stmt_execute($stmt);
          header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?query=showposts&post=success");
          exit();
     }
     mysqli_close($conn);
}else{
     header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?query=createnpost&post=discard");
     exit();
}
?>
