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
        <div class = "container w-100 px-5 mt-5" style = "text-align: center;" id = "posts_container"><div class = "row justify-content-center align-items-center" id = "posts_area"></div></div>
<?php
    $result = $connection->query("select Description, Username, URL from posts order by ID desc limit 25;");
    if ($result->num_rows == 0) { ?>
        <script>
            document.getElementById("posts_container").innerHTML = "<i>No posts yet</i>";
        </script>
    <?php }
    while ($row = $result->fetch_assoc()) {
        $description = $row["Description"];
        $url = $row["URL"];
        $username = $row["Username"];
        $post = "<div class = 'card col-lg-6 mt-1 mb-1'>".
            "<div class = 'h-100 d-flex justify-content-center align-items-center'><img class = 'card-img-top' src = '$url' alt = '$url'></div>".
            "<div class = 'card-body'>$description</div>".
            "<div class = 'card-footer'>$username</div></div>"; ?>
        <script>
            document.getElementById("posts_area").innerHTML += "<?php echo $post; ?>";
        </script>
    <?php }
    include("html_footer.php");
?>