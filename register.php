<?php
    include ("config.php");
    if (isset($_REQUEST["register_button"]) && $_REQUEST["register_button"] == "true") {
        $name = $_REQUEST["register_name"];
        $username = $_REQUEST["register_username"];
        $email = $_REQUEST["register_email"];
        $password = hash('sha256', $_REQUEST["register_password"]);
        $backup_code = generateBase32Secret();
        $query = "select EMail from users where Username = '$username';"; $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $_SESSION["toast_message"] = "Username already exists";
            header("Location: index.php");
        }
        $query = "insert into users(Name, Username, EMail, Password, BackupCode) values ('$name', '$username', '$email', '$password', '$backup_code');"; $result = $connection->query($query);
        if ($result === true) {
            $_SESSION["toast_message"] = "Welcome ".$name;
            $_SESSION['login_status'] = "true";
            $_SESSION['login_userID'] = $connection->insert_id;
            $_SESSION['login_email'] = $email;
            $_SESSION['login_name'] = $name;
            $_SESSION['login_bio'] = "";
            $_SESSION['backup_code'] = $backup_code;
            $_SESSION['login_username'] = $username;
            header("Location: home.php");
        } else {
            $_SESSION["toast_message"] = "User cannot be registered.";
            header("Location: index.php");
        }
    }
    function generateBase32Secret() {
        $alphabets = "ABCDEFGHIJKLMNOPQRSTUVWXYZ234567";
        $secret = "";
        for ($i = 0; $i < 16; $i++) {
            $secret .= $alphabets[random_int(0, strlen($alphabets) - 1)];
        }
        return $secret;
    }
?>