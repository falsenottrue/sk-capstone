<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $usernm = $_POST['usernm'];
    $email = $_POST['email'];
    $passwrd = password_hash($_POST['passwrd'], PASSWORD_DEFAULT);


    $sql = "SELECT * FROM users WHERE usernm = '$usernm'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Username already taken. Please choose a different username.";
    } else {
        $sql = "INSERT INTO users (usernm, email, passwrd) VALUES ('$usernm', '$email', '$passwrd')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully. <a href='login.php'>Login</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <link rel="icon" type="image/png" href="./NNLOGO.png">
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="usernm" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Password:</label><br>
        <input type="password" name="passwrd" required><br><br>
        
        <button type="submit">Sign Up</button>
    </form>
    <br>
    <a href="login.php">Already have an account? Login here</a>
</body>
</html>