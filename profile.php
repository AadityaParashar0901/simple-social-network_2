<?php
    include ("config.php");
    if (isset($_SESSION["toast_message"]) && $_SESSION['toast_message'] != "") {
        showToastMessage($_SESSION["toast_message"]);
        $_SESSION['toast_message'] = "";
    }
    if (!isset($_SESSION["login_status"]) || $_SESSION["login_status"] == "false") {
        header("Location: index.php");
    }
    include("html_header.php");
    include("home_nav.php");
?>
        <div class = "jumbotron container d-flex justify-content-evenly mb-3">
            <span class = "material-symbols-rounded" style = "color: var(--text_color); font-size: 8rem;">account_circle</span>
            <div class = "d-flex flex-column w-100" style = "justify-content: center; align-items: flex-start;">
                <h1><?php echo $_SESSION["login_username"]; ?></h1>
                <h6><?php echo $_SESSION["login_name"]; ?></h6>
                <h6 class = "text-muted-custom"><?php echo $_SESSION["login_email"]; ?></h6>
                <p class = "text-muted-custom"><?php if ($_SESSION["login_bio"] == "") echo "<i>Empty Bio</i>"; else echo $_SESSION["login_bio"]; ?></p>
            </div>
            <button class = "btn" style = "width: auto; height: 4rem;" data-bs-toggle = "modal" data-bs-target = "#editProfile">
                <span class = "material-symbols-rounded" style = "color: var(--text_color);">edit</span>
            </button>
            <button class = "btn" style = "width: auto; height: 4rem;" data-bs-toggle = "modal" data-bs-target = "#showBackupCode">
                <span class = "material-symbols-rounded" style = "color: var(--text_color);">passkey</span>
            </button>
        </div>
        <div class = "container" style = "text-align: center" id = "posts_container"><div class = "row w-100" id = "posts_area"></div></div>
        <div class = "modal" id = "editProfile">
            <div class = "modal-dialog modal-dialog-centered">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <h4 class = "modal-title">Edit Profile</h4>
                        <button type = "button" class = "btn-close" data-bs-dismiss = "modal"></button>
                    </div>
                    <div class = "modal-body">
                        <form method = "post" action = "edit_profile.php">
                            <div class = "form-floating mt-3 mb-1">
                                <input type = "text" class = "form-control" placeholder = "Enter Name" id = "edit_name" name = "edit_name" value = "<?php echo $_SESSION["login_name"]; ?>" required>
                                <label for = "edit_name" class = "form-label">Name</label>
                            </div>
                            <div class = "form-floating mb-5">
                                <textarea class = "form-control" placeholder = "Enter Bio" id = "edit_bio" name = "edit_bio" rows = "3" required><?php echo $_SESSION["login_bio"]; ?></textarea>
                                <label for = "edit_bio" class = "form-label">Bio</label>
                            </div>
                            <button class = "btn btn-custom" type = "submit" id = "edit_profile_submit" name = "edit_profile_submit" value = "true">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class = "modal" id = "showBackupCode">
            <div class = "modal-dialog modal-dialog-centered">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <h4 class = "modal-title">Backup Code</h4>
                        <button type = "button" class = "btn-close" data-bs-dismiss = "modal"></button>
                    </div>
                    <div class = "modal-body">
                        <p>Your Backup Code is: <b><?php echo $_SESSION["backup_code"]; ?></b></p>
                    </div>
                </div>
            </div>
        </div>
<?php
    $username = $_SESSION["login_username"];
    $result = $connection->query("select Description, Username, URL from posts where Username = '$username' order by ID desc limit 25;");
    if ($result->num_rows == 0) { ?>
        <script>
            document.getElementById("posts_container").innerHTML = "<i>No posts yet</i>";
        </script>
    <?php }
    while ($row = $result->fetch_assoc()) {
        $description = $row["Description"];
        $url = $row["URL"];
        $username = $row["Username"];
        $post = "<div class = 'card col-md-4'>".
            "<div class = 'h-100 d-flex justify-content-center align-items-center'><img class = 'card-img-top' src = '$url' alt = '$url'></div>".
            "<div class = 'card-body'>$description</div>".
            "<div class = 'card-footer w-100'>".
                "<div class = 'd-flex justify-content-between'>".
                    "<span>$username</span><a href = 'delete_post.php?url=$url&username=$username'><span class = 'material-symbols-rounded' style = 'color: red'>delete_forever</span></a>".
                "</div></div></div>"; ?>
        <script>
            document.getElementById("posts_area").innerHTML += "<?php echo $post; ?>";
        </script>
    <?php }
    include("html_footer.php");
?>