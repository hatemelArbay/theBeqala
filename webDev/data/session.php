<?php
 // Reset session.gc_maxlifetime to its default value
// ini_restore('session.gc_maxlifetime');
$duration = 6000; // in seconds
session_set_cookie_params($duration, '/', '', true, true);
session_start(); // Start the session

// Check if the user is already logged in
if (isset($_SESSION["userPID"])) {
    // Check if the user is an admin
    if (isset($_SESSION["adminID"])){
        header("Location: dashboard.php"); // Redirect to the dashboard
    }
    // Check if the user is a customer
    elseif (isset($_SESSION["custID"])){
        header("Location: HomePage.php"); // Redirect to the homepage
    }
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "grocerydb";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_POST["signIn"])) {
    // Get the email and password from the form
    $email = $_POST["EmailAddress"];
    $password = $_POST["UserPassword"];

    // Check if the user is an admin
    $sql = "SELECT * FROM admin INNER JOIN user
     ON admin.userPID = user.userPID WHERE email='$email' AND pass='$password'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        // Set the session variables for the admin
        $row = $result->fetch_assoc();
        $_SESSION["userPID"] = $row["userPID"];
        $_SESSION["adminID"] = $row["adminID"];
        $_SESSION["UserName"] = $row["name"];
        $_SESSION["EmailAddress"] = $row["email"];
        header("Location: dashboard.php"); // Redirect to the dashboard
    }
    else {
        // Check if the user is a customer
        $sql = "SELECT * FROM customer INNER JOIN user
         ON customer.userPID = user.userPID WHERE email='$email' AND pass='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            
            $row = $result->fetch_assoc();
            $_SESSION["userPID"] = $row["userPID"];
            $_SESSION["custID"] = $row["custID"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["email"] = $row["email"];
            header("Location: HomePage.php");
        } else {
            $error = "Invalid email or password";
            echo $error;
        }
    }

    $conn->close(); // Close the database connection
}

 }