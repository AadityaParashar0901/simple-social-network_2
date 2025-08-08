function showLogin() {
    document.getElementById("login-form").style.display = "block";
    document.getElementById("register-form").style.display = "none";
}
function showRegister() {
    document.getElementById("login-form").style.display = "none";
    document.getElementById("register-form").style.display = "block";
}
function goToPage(page) {
    location.href = page;
}
function logout() {
    location.href = "logout.php";
}