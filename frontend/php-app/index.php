<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // For demo: simple login without database
    $_SESSION['user'] = $email;
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - AI CMS</title>
</head>
<body>
<h2>AI-Powered CMS - Login</h2>
<form method="POST">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>
