<?php
    include ("config.php");
    $_SESSION['login_status'] = "false";
    $_SESSION['login_userID'] = "0";
    $_SESSION['login_username'] = "";
    $_SESSION["toast_message"] = "Logged Out";
    header("Location: index.php");
?>