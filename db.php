
<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbtenzin";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
} else {
    echo "Connection was successful<br>";
}
// // Create a db
// $sql = "CREATE DATABASE dbtenzin";
// $result = mysqli_query($conn, $sql);

// // Check for the database creation success
// if($result){
//     echo "The db was created successfully!<br>";
// }
// else{
//     echo "The db was not created successfully because of this error ---> ". mysqli_error($conn);
// }
//Create a table in the db

// Create a table in the db
$sql = "CREATE TABLE `register1` (
    `S_No` INT(10) NOT NULL AUTO_INCREMENT,
    `Email` VARCHAR(255) NOT NULL,
    `Password` VARCHAR(255) NOT NULL,
    `Confirm_Password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`S_No`)
)";

// $result = mysqli_query($conn, $sql);

// // Check for the table creation success
// if ($result) {
//     echo "The table was created successfully!<br>";
// } else {
//     echo "The table was not created successfully because of this error ---> " . mysqli_error($conn);
// }
// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }
    // // Hash the password for security
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $sql = "INSERT INTO `register1` (`email`, `password`, `confirm_password`) VALUES ('$email', '$password', '$confirm_password')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Sign up successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>
