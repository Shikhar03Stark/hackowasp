<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "webdb";

$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
if(!$conn){
     die("Error Accessing Database ");
}
 ?>
