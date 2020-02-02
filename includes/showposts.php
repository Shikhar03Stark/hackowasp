<?php
if(!isset($_SESSION['username'])){
     header("Location: http://localhost/hackathon(hackowasp2.0)/society.php");
     exit();
}
else{
     require 'connectdb.php';
     $postid = $_SESSION['id'];
     $sql = "SELECT * FROM posts WHERE postid=".$postid." ORDER BY dop DESC";
     $result = mysqli_query($conn, $sql);
     if(!$result || mysqli_num_rows($result) == 0){
          echo "No Posts Submitted by You!!";
     }
     else{
          while($rows = mysqli_fetch_assoc($result)){
               echo "
               <div class = 'tile'>"
               .$rows['title']."<br>
               <span style='font-size:12px'>Author: ".$rows['author']."</span>
               <p class = 'content'>"
               .$rows['content']."
               </p><br>
               <span style ='font-size:12px'>Published On: ".$rows['dop']."</span>
               </div>
               ";
               }
          }
}
?>
