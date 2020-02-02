<?php
if(isset($_SESSION['username'])){
    require 'soc_env.php';
}
else{

    if(isset($_GET['err'])){
        echo "<span class = 'alert_d' onclick = 'hide()'>";
        $errortype = $_GET['err'];
            if($errortype == "empty"){
                echo "All fields are Mandatory in SignUp/Login Form";
            }
            elseif($errortype == "notmatch"){
                echo "The Confirm Password did not match the Typed Password in SignUp Form";
            }
            elseif($errortype == "invldusrnm"){
                echo "Username Can only contain Alphabets and numerics";
            }
            elseif($errortype == "usernmtaken"){
                echo "The Username Already Exist";
            }
            elseif($errortype == "codeexist"){
                echo "The Unique Code is already in USE";
            }
            elseif($errortype == "dberr1" || $errortype == "dberr2" || $errortype == "dberr3" || $errortype == "dberr4"){
                echo "Connection Error to Database. Please Try again Later";
            }
            echo "</div>";
        }

        if(isset($_GET['login'])){
            echo "<span class = 'alert_s'>";
                if($_GET['login'] == "success"){
                    echo "Please Login to Continue";
                }
            echo "</div>";
            }


    echo ("
<div class = 'tile'>
    <fieldset>
        <legend>Society Login</legend>
        <form method='post' name='society_login' action = 'includes\society_login.php'>
            <span>Username</span>&nbsp;
            <input type = 'text' name = 'username' placeholder='username001' maxlength='60'><br><br>
            <span>Password </span>&nbsp;
            <input type = 'password' placeholder = 'Password' name = 'password' maxlength='60'>
            <br><br>
            <input type = 'submit' name = 'log_btn' value = 'LOGIN'>
        </form>
    </fieldset>
</div>
<div class = 'tile'>
    <fieldset>
        <legend>Society Sign Up</legend>
        <form method='post' name='society_signup' action = 'includes\society_signup.php'>
            <span>Society Name</span>&nbsp;
            <input type = 'text' name = 'soc_name' placeholder='Society' maxlength='60'><br><br>
            <span>Username </span>&nbsp;
            <input type = 'text' name = 'soc_username' placeholder='username001' maxlength='60'>
            <br><br>
            <span>Password </span>&nbsp;
            <input type = 'password' name = 'soc_pass' placeholder = 'Password' align = 'right' maxlength='60'>
            <br><br>
            <span>Re-Type Password </span>&nbsp;
            <input type = 'password' name = 'soc_repass' placeholder = 'Re Password' align = 'right' maxlength='60'>
            <br><br>
            <span>Thapar Society Code </span>&nbsp;
            <input type = 'text' name = 'soc_code' placeholder = 'Thapar Unique Code' align = 'right' maxlength='60'>
            <br><br>
            <input type = 'submit' name = 'signup_btn' value = 'SIGN UP'>
        </form>
    </fieldset>
</div>
");
}
?>
