<?php
    session_start();
    // $connection = mysqli_connect("localhost", "root", "", "social_network");
    $connection = mysqli_connect("db.us-losa1.bengt.wasmernet.com:16751", "c13b46807ac0800005a4c3d7873c", "0689c13b-4680-7bf2-8000-895247d0312a", "simple_social_network");
    if (!$connection) die("Connection Failed: ".mysqli_connect_error());
    function console_log($msg) {
        echo "<script>console.log(\"$msg\")</script>";
    }
    function showToastMessage($message) { ?>
        <div class = "toast show position-fixed mt-5 mx-5" style = "z-index: 10;">
            <div class = "toast-header w-100 d-flex justify-content-between align-items-center" style = "background-color: var(--background_color_light); color: white;">
                <h5>Message</h5>
                <button type = "button" class = "btn-close" style = "background-color: white;" data-bs-dismiss = "toast"></button>
            </div>
            <div class = "toast-body" style = "font-size: 0.9rem;">
                <?php echo $message; ?>
            </div>
        </div>
    <?php }
?>