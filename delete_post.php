<?php
    include ("config.php");
    if (isset($_REQUEST["url"])) {
        $url = $_REQUEST["url"];
        if ($_SESSION["login_username"] != $_REQUEST["username"]) {
            $_SESSION["toast_message"] = "You cannot delete other user's post";
            header("Location: profile.php");
            exit();
        }
        $result = $connection->query("delete from posts where URL = '$url';");
        if (file_exists($url) && $result === TRUE) {
            if (unlink($url)) {
                $_SESSION["toast_message"] = "Post Deleted";

            } else {
                $_SESSION["toast_message"] = "An error occured while delete post";
            }
        } else {
            $_SESSION["toast_message"] = "Cannot delete post";
        }
        header("Location: profile.php");
    }
?>