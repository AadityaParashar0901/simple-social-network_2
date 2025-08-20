<?php
    include ("config.php");
    if (isset($_REQUEST["forgot_button"]) && $_REQUEST["forgot_button"] == "true") {
        $username = $_REQUEST['forgot_username'];
        $code = $_REQUEST['forgot_code'];
        $password = hash('sha256', $_REQUEST["forgot_password"]);
        $query = "select BackupCode from users where Username = '$username' and BackupCode = '$code';"; $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $query = "update users set Password = '$password' where Username = '$username';"; $connection->query($query);
            $_SESSION["toast_message"] = "Password Updated Successfully. Please Login";
            header("Location: index.php");
        } else {
            $_SESSION['toast_message'] = "User not Found";
            header("Location: index.php");
        }
    }
?>