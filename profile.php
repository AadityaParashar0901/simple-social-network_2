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
        <div class = "jumbotron container d-flex justify-content-evenly">
            <span class = "material-symbols-rounded" style = "color: var(--background_color); font-size: 8rem;">account_circle</span>
            <div class = "d-flex flex-column w-100" style = "justify-content: center; align-items: flex-start;">
                <h1><?php echo $_SESSION["login_username"]; ?></h1>
                <h6><?php echo $_SESSION["login_name"]; ?></h6>
                <h6 class = "text-muted"><?php echo $_SESSION["login_email"]; ?></h6>
                <p class = "text-muted"><?php echo $_SESSION["login_bio"]; ?></p>
            </div>
        </div>
        <div class = "container" style = "text-align: center" id = "posts_container"><div class = "row w-100" id = "posts_area"></div></div>
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
                    "<span>$username</span><a href = 'delete_post.php?url=$url'><span class = 'material-symbols-rounded' style = 'color: red'>delete_forever</span></a>".
                "</div></div></div>"; ?>
        <script>
            document.getElementById("posts_area").innerHTML += "<?php echo $post; ?>";
        </script>
    <?php }
    include("html_footer.php");
?>