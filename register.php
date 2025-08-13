<?php
    include ("config.php");
    if (isset($_REQUEST["register_button"]) && $_REQUEST["register_button"] == "true") {
        $username = $_REQUEST["register_username"];
        $email = $_REQUEST["register_email"];
        $password = $_REQUEST["register_password"];
        $query = "select EMail from users where Username = '$username';"; $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $_SESSION["toast_message"] = "Username already exists";
            header("Location: index.php");
        }
        $query = "insert into users(Username, EMail, Password) values ('$username', '$email', '$password');"; $result = $connection->query($query);
        if ($result === true) {
            $_SESSION["toast_message"] = "User Registered. Please Login";
            header("Location: index.php");
        } else {
            $_SESSION["toast_message"] = "User cannot be registered.";
            header("Location: index.php");
        }
    }
?>