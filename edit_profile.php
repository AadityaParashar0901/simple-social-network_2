<?php
    include ("config.php");
    if (isset($_REQUEST["edit_profile_submit"]) && $_REQUEST["edit_profile_submit"] == "true") {
        $name = $_REQUEST['edit_name'];
        $bio = $_REQUEST['edit_bio'];
        $username = $_SESSION['login_username'];
        $query = "update users set Name = '$name', Bio = '$bio' where Username = '$username';"; $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $_SESSION["login_name"] = $name;
            $_SESSION["login_bio"] = $bio;
            $_SESSION["toast_message"] = "Profile Updated Successfully";
            header("Location: profile.php");
        } else {
            $_SESSION['toast_message'] = "Profile Update Failed";
            header("Location: profile.php");
        }
    }
?>