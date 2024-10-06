<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error)
    {
        die("Connection Failed: ". $conn->connect_error);
    }

    $usernm = $_POST['usernm'];
    $passwrd = $_POST['passwrd'];

    $sql = "SELECT * FROM users WHERE usernm = '$usernm'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();

        if (password_verify($passwrd, $row['passwrd']))
        {
            $_SESSION['usernm'] = $usernm;
            echo "Login Successful. Welcome, " . $usernm . " to the Nagkaisang Nayon Youth Database. <a href='welcome2.php'>Go to welcome page</a>";
        }
        else
        {
            echo "Invalid Username or Password";
        }
    }
    else 
    {
        echo "No user found with that username";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./index.css">
    <link rel="icon" type="image/png" href="./NNLOGO.png">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="usernm" required><br><br>
        
        <label>Password:</label><br>
        <input type="password" name="passwrd" required><br><br>
        
        <button type="submit">Login</button>
    </form>
    <br>
    <a href="signup.php">Don't have an account? Sign up here</a>
</body>
</html>