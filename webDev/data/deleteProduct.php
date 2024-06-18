<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the product ID from the form
    $productID = $_POST['productID'];


    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "grocerydb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the product in the database
    $sql = "DELETE FROM product WHERE productID='$productID';";

    if (mysqli_query($conn, $sql)) {
        echo "Product updated successfully";
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
    // Close the database connection
    mysqli_close($conn);
}
