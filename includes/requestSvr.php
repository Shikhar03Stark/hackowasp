<?php
if(isset($_POST['mypost'])){
    $_SESSION['query'] = "mypost";
    header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?query=mypost");
    exit();
}
elseif(isset($_POST['createnpost'])){
    $_SESSION['query'] = "createnpost";
    header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?query=createnpost");
    exit();
}
elseif (isset($_POST['details'])) {
    $_SESSION['query'] = "details";
    header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?query=details");
    exit();
}
elseif (isset($_POST['logout'])) {
    session_start();
    session_destroy();
    header("Location: http://localhost/hackathon(hackowasp2.0)/society.php?query=logout");
    exit();
}
else{
    header("Location: http://localhost/hackathon(hackowasp2.0)/society.php");
    exit();
}

 ?>
