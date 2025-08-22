<?php
    include ("config.php");
    if (isset($_SESSION["toast_message"]) && $_SESSION['toast_message'] != "") {
        showToastMessage($_SESSION["toast_message"]);
        $_SESSION['toast_message'] = "";
    }
    if (!isset($_SESSION["login_status"]) || $_SESSION["login_status"] == "false") {
        header("Location: index.php");
    }
    if (isset($_REQUEST["add_post_button"]) && $_REQUEST["add_post_button"] == "true") {
        $username = $_SESSION["login_username"];
        $description = $_REQUEST["add_post_description"];
        $connection->query("insert into posts(Description, Username) values ('$description', '$username');");
        $id = $connection->query("select ID from posts order by ID desc limit 1;")->fetch_assoc()["ID"];
        $target_file = "posts/post_".$id."_".$username;
        $connection->query("update posts set URL = '$target_file' where ID = '$id'");
        if (move_uploaded_file($_FILES["add_post_file"]["tmp_name"], $target_file)) {
            $_SESSION["toast_message"] = "Added Post Successfully";
            header("Location: home.php");
        }
    }
    include("html_header.php");
    include("home_nav.php");
?>
        <div class = "container">
            <div class = "mt-5 w-100 d-flex justify-content-center align-items-center flex-direction-column">
                <div id = "post_area"></div>
                <form action = "add_post.php" method = "post" enctype = "multipart/form-data" class = "w-100 transparent">
                    <div class = "w-100 mb-3">
                        <input type = "file" class = "w-100 form-control" id = "add_post_file" name = "add_post_file" required>
                    </div>
                    <div class = "w-100 form-floating mb-3">
                        <textarea class = "form-control" id = "add_post_description" name = "add_post_description" placeholder = "Enter Description" required></textarea>
                        <label for = "add_post_description">Description</label>
                    </div>
                    <button type = "submit" class = "w-100 btn-custom d-flex justify-content-center" style = "margin: 0px;" id = "add_post_button" name = "add_post_button" value = "true"><span>Add Post</span></button>
                </form>
            </div>
        </div>
<?php include("html_footer.php"); ?>