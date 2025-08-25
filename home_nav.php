        <nav class = "navbar navbar-expand-md justify-content-between" style = "padding: 16px 8px;">
            <div class = "container-fluid">
                <button class = "navbar-toggler" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navbarControls">
                    <span class = "material-symbols-rounded">menu</span>
                </button>
                <div class = "navbar-collapse collapse" id = "navbarControls">
                    <ul class = "navbar-nav flex-row mt-3 mb-3">
                        <li class = "nav-item">
                            <a href = "profile.php" class = "nav-item-custom">
                                <span class = "material-symbols-rounded">account_circle</span>
                                <span class = "nav-link" style = "color: white;">Profile</span>
                            </a>
                        </li>
                        <li class = "nav-item">
                            <a href = "home.php" class = "nav-item-custom">
                                <span class = "material-symbols-rounded">home</span>
                                <span class = "nav-link" style = "color: white;">Home</span>
                            </a>
                        </li>
                        <li class = "nav-item">
                            <a href = "add_post.php" class = "nav-item-custom">
                                <span class = "material-symbols-rounded">add_circle</span>
                                <span class = "nav-link" style = "color: white;">Add Post</span>
                            </a>
                        </li>
                    </ul>
                    <h6 class = "text-white w-100 m-3 px-3"><center><?php echo $_SESSION["login_username"]; ?></center></h6>
                    <ul class = "navbar-nav flex-row mt-3 mb-3">
                        <li class = "nav-item">
                            <button type = "button" class = "btn-custom" data-bs-toggle = "modal" data-bs-target = "#logoutModal">Logout</button>
                        </li>
                        <li class = "nav-item">
                            <button type = "button" class = "btn-custom" data-bs-toggle = "modal" data-bs-target = "#aboutModal">About</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class = "modal" id = "logoutModal">
            <div class = "modal-dialog modal-dialog-centered">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <h4 class = "modal-title">Logout</h4>
                    </div>
                    <div class = "modal-body">
                        Logout?
                    </div>
                    <div class = "modal-footer d-flex justify-content-between">
                        <button type = "button" class = "btn-custom" style = "width: 45%;" data-bs-dismiss = "modal" onClick = "logout();">Yes</button>
                        <button type = "button" class = "btn-custom" style = "width: 45%;" data-bs-dismiss = "modal">No</button>
                    </div>
                </div>
            </div>
        </div>
        <div class = "modal" id = "aboutModal">
            <div class = "modal-dialog modal-dialog-centered">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <h4 class = "modal-title">About</h4>
                        <button type = "button" class = "btn-close" data-bs-dismiss = "modal"></button>
                    </div>
                    <div class = "modal-body">
                        <h5>Simple Social Network</h5>
                    </div>
                </div>
            </div>
        </div>