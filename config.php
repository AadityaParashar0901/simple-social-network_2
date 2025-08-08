<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "", "social_network");
    if (!$connection) die("Connection Failed: ".mysqli_connect_error());
    function console_log($msg) {
        echo "<script>console.log(\"$msg\")</script>";
    }
    function showToastMessage($message) { ?>
        <div class = "toast show position-fixed mt-5 mx-5" style = "z-index: 10;">
            <div class = "toast-header w-100 d-flex justify-content-between align-items-center">
                <p>Message</p>
                <button type = "button" class = "btn-close" data-bs-dismiss = "toast"></button>
            </div>
            <div class = "toast-body">
                <?php echo $message; ?>
            </div>
        </div>
    <?php }
?>