<?php
session_start();
if (!isset($_SESSION['usernm'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./index.css">
    <link rel="icon" type="image/png" href="./NNLOGO.png">
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['usernm']; ?> to the Nagkaisang Nayon Youth Database!</h2>
    <p>You are now logged in.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
