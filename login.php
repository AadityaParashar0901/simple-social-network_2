<?php
    include ("config.php");
    if (isset($_REQUEST["login_button"]) && $_REQUEST["login_button"] == "true") {
        $username = $_REQUEST['login_username'];
        $password = $_REQUEST["login_password"];
        $query = "select ID, Password from users where Username = '$username' and Password = '$password';"; $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $_SESSION['login_status'] = "true";
            $_SESSION['login_userID'] = $result->fetch_assoc()["ID"];
            $_SESSION['login_username'] = $username;
            $_SESSION["toast_message"] = "Logged In";
            header("Location: home.php");
        } else {
            $_SESSION['toast_message'] = "User or Password Incorrect";
            header("Location: index.php");
        }
    }
?>