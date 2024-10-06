<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root"; // Change if necessary
    $password = ""; // Change if necessary
    $dbname = "skcapstone";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from the POST request
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $marital_status = $_POST['marital_status'];
    $nationality = $_POST['nationality'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $postal_code = $_POST['postal_code'];
    $education_level = $_POST['education_level'];
    $employment_status = $_POST['employment_status'];
    $annual_income = $_POST['annual_income'];
    $occupation = $_POST['occupation'];
    $number_of_dependents = $_POST['number_of_dependents'];
    $ethnicity = $_POST['ethnicity'];
    $religion = $_POST['religion'];
    $language_spoken = $_POST['language_spoken'];
    $hobbies = $_POST['hobbies'];

    $sql = "INSERT INTO demographics (first_name, last_name, date_of_birth, gender, marital_status, nationality, email, phone_number, address, city, state, country, postal_code, education_level, employment_status, annual_income, occupation, number_of_dependents, ethnicity, religion, language_spoken, hobbies) 
            VALUES ('$first_name', '$last_name', '$dob', '$gender', '$marital_status', '$nationality', '$email', '$phone_number', '$address', '$city', '$state', '$country', '$postal_code', '$education_level', '$employment_status', '$annual_income', '$occupation', '$number_of_dependents', '$ethnicity', '$religion', '$language_spoken', '$hobbies')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demographic Information Form</title>
</head>
<body>
    <h2>Enter Demographic Information</h2>
    <form method="POST" action="">
        <label>First Name:</label><br>
        <input type="text" name="first_name" required><br><br>
        
        <label>Last Name:</label><br>
        <input type="text" name="last_name" required><br><br>
        
        <label>Date of Birth:</label><br>
        <input type="date" name="date_of_birth" required><br><br>

        <!-- Add other fields similarly as needed -->

        <button type="submit">Submit</button>
    </form>
</body>
</html>
