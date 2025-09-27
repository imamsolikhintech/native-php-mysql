<?php
// Start the session to access user login info
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 40px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            margin-top: 0;
        }
        .info {
            margin-bottom: 20px;
        }
        .info span {
            font-weight: bold;
        }
        a.logout {
            display: inline-block;
            margin-top: 20px;
            color: #fff;
            background: #dc3545;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }
        a.logout:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>
        <div class="info">
            <p>Welcome, <span><?php echo htmlspecialchars($user['name']); ?></span>!</p>
            <p>Email: <span><?php echo htmlspecialchars($user['email']); ?></span></p>
            <p>Login Time: <span><?php echo htmlspecialchars($user['login_time'] ?? date('Y-m-d H:i:s')); ?></span></p>
        </div>
        <a class="logout" href="login.php?action=logout">Logout</a>
    </div>
</body>
</html>
