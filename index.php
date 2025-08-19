<?php
    include ("config.php");
    if (isset($_SESSION["toast_message"]) && $_SESSION['toast_message'] != "") {
        showToastMessage($_SESSION["toast_message"]);
        $_SESSION['toast_message'] = "";
    }
    if (isset($_SESSION["login_status"]) && $_SESSION["login_status"] == "true") {
        header("Location: home.php");
    }
    include("html_header.php");
?>
        <style>
            body {
                background-image: url('images/background.png');
                background-position: center;
                background-attachment: fixed;
            }
        </style>
        <nav class = "navbar navbar-expand d-flex justify-content-end">
            <ul class = "navbar-nav">
                <li class = "nav-item">
                    <button type = "button" class = "btn-custom" data-bs-toggle = "modal" data-bs-target = "#contact_modal">Contact Us</a>
                </li>
                <li class = "nav-item">
                    <button type = "button" class = "btn-custom" data-bs-toggle = "modal" data-bs-target = "#help_modal">Help</a>
                </li>
            </ul>
        </nav>
        <div class = "d-flex align-items-center justify-content-center" style = "height: 90%">
            <div class = "container" id = "login-box">
                <div class = "d-flex justify-content-around align-items-center" id = "info_login">
                    <div class = "me-3" id = "info">
                        <h1>Simple Social Network</h1>
                        <i>where your voice becomes a vibe</i>
                    </div>
                    <div class = "container-fluid me-2" id = "login-form">
                        <h1><center>Sign In</center></h1>
                        <form action = "login.php" method = "post">
                            <div class = "form-floating mt-3 mb-1">
                                <input type = "text" class = "form-control" id = "login_username" placeholder = "Enter Username" name = "login_username" autocomplete>
                                <label for = "login_username">Username</label>
                            </div>
                            <div class = "form-floating mb-5">
                                <input type = "password" class = "form-control" id = "login_password" placeholder = "Enter Password" name = "login_password">
                                <label for = "login_password">Password</label>
                                <!-- <div class = "d-flex justify-content-end align-items-center"><a class = "nav-link" href = "#">Forgot Password?</a></div> -->
                            </div>
                            <div class = "d-flex justify-content-center align-items-center">
                                <button id = "login_button" name = "login_button" value = "true" type = "submit" class = "btn-custom-login">Sign In</button>
                            </div>
                        </form>
                        <div class = "d-flex">Don't have any account yet?&nbsp;<a class = "nav-link" onClick = "showRegister();">Register</a></div>
                    </div>
                    <div class = "container-fluid me-2" id = "register-form">
                        <h1><center>Register</center></h1>
                        <form action = "register.php" method = "post">
                            <div class = "form-floating mt-3">
                                <input type = "email" class = "form-control" id = "register_email" placeholder = "Enter E-Mail" name = "register_email">
                                <label for = "register_email">E-Mail</label>
                            </div>
                            <div class = "form-floating mt-1 mb-1">
                                <input type = "text" class = "form-control" id = "register_username" placeholder = "Enter Username" name = "register_username">
                                <label for = "register_username">Username</label>
                            </div>
                            <div class = "form-floating mb-5">
                                <input type = "password" class = "form-control" id = "register_password" placeholder = "Enter Password" name = "register_password">
                                <label for = "register_password">Password</label>
                            </div>
                            <div class = "d-flex justify-content-center align-items-center">
                                <button id = "register_button" name = "register_button" value = "true" type = "submit" class = "btn-custom-login">Register</button>
                            </div>
                        </form>
                        <div class = "d-flex">Already have an account?&nbsp;<a class = "nav-link" onClick = "showLogin();">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "modal" id = "contact_modal">
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <h4 class = "modal-title">Contact Us</h4>
                        <button type = "button" class = "btn-close" data-bs-dismiss = "modal"></button>
                    </div>
                    <div class = "modal-body">
                        <p><b>Email:</b>support@simplesocial.com</p>
                        <p><b>Phone:</b>+91 00000 00000</p>
                    </div>
                </div>
            </div>
        </div>
        <div class = "modal" id = "help_modal">
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <h4 class = "modal-title">Help</h4>
                        <button type = "button" class = "btn-close" data-bs-dismiss = "modal"></button>
                    </div>
                    <div class = "modal-body">
                        <form action = "query.php" method = "post">
                            <div class = "form-floating mt-3">
                                <input class = "form-control" type = "email" id = "query_email" name = "query_email" placeholder = "Enter EMail" required>
                                <label for = "query_email">EMail</label>
                            </div>
                            <div class = "form-floating mt-3 mb-3">
                                <textarea class = "form-control" id = "query_query" name = "query_query" placeholder = "Enter Query"></textarea>
                                <label for = "query_query">Query</label>
                            </div>
                            <button type = "submit" class = "btn-custom" id = "query_submit" name = "query_submit" value ="true">Submit Query</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>document.getElementById("register-form").style.display = "none";</script>
<?php include("html_footer.php"); ?>