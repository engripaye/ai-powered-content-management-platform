<?php
global $API_BASE_URL;
session_start();
include("config.php");

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        "title" => $_POST['title'],
        "body" => $_POST['body']
    );

    $ch = curl_init($API_BASE_URL . "/content");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Publish Content - AI CMS</title>
</head>
<body>
<h2>Publish New Content</h2>
<form method="POST">
    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Body:</label><br>
    <textarea name="body" rows="5" required></textarea><br><br>

    <button type="submit">Publish</button>
</form>
</body>
</html>
