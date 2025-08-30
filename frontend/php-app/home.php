<?php
session_start();
include("config.php");

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

// Fetch content from Java backend API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $API_BASE_URL . "/content");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$contents = json_decode($response, true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - AI CMS</title>
</head>
<body>
<h2>Welcome, <?php echo $_SESSION['user']; ?> 👋</h2>
<a href="publish.php">Publish New Content</a> |
<a href="index.php">Logout</a>
<hr>
<h3>Published Content</h3>
<ul>
    <?php if (!empty($contents)) {
        foreach ($contents as $content) {
            echo "<li><b>{$content['title']}</b> - {$content['body']}</li>";
        }
    } else {
        echo "<li>No content available</li>";
    } ?>
</ul>
</body>
</html>
