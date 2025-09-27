<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../controllers/auth_controller.php';
    
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validasi password confirmation
    if ($password !== $confirm_password) {
        echo "<script>alert('Password tidak cocok!');</script>";
    } else {
        $controller = new AuthController();
        $result = $controller->register($name, $username, $password);
        
        if ($result) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal! Username sudah terdaftar.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form method="post" action="">
        <h2>Register</h2>
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Username: <input type="text" name="username" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <label>Confirm Password: <input type="password" name="confirm_password" required></label><br>
        <button type="submit">Register</button>
        <br>
        <a href="login.php">Login here</a>
    </form>
</body>
</html>
