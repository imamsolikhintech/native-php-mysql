<?php
// Check if logout action is requested
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    require_once '../controllers/auth_controller.php';
    $controller = new AuthController();
    $controller->logout();
}

// Start of Selection
if (isset($_POST["LOGIN"])) {
    require_once '../controllers/auth_controller.php';
    $controller = new AuthController();
    $result = $controller->login($_POST["username"], $_POST["password"]);
    if($result){
        // redirect ke dashboard.php
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Login gagal');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit" name="LOGIN">Login</button>
        <br>
        <a href="register.php">Register here</a>
    </form>
</body>

</html>
<?php
// panggil fungsi login di controller jika post data

// End of Selection
?>