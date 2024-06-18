<?php
// Set up database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grocerydb";

// Create a new mysqli object to connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define an array of categories
$categories = array("Fruits", "Vegetables", "Dairy", "Milk", "Snacks", "Beverages", "Cereals", "FrozenFood");

// Define an array to hold the product data
$productData = array();

// Loop through each category
foreach ($categories as $category) {
    // Define a SQL query to select a random product from the current category
    $sql = "SELECT productName, productDescription, productCategory, productPrice, productImg, productDate, productQuantity FROM product WHERE productCategory = '$category' ORDER BY RAND() LIMIT 1";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Loop through each row in the result set and add the product data to the productData array
        while ($row = $result->fetch_assoc()) {
            $product = array(
                "name" => $row["productName"],
                "description" => $row["productDescription"],
                "category" => $row["productCategory"],
                "price" => $row["productPrice"],
                "image" => $row["productImg"],
                "date" => $row["productDate"],
                "quantity" => $row["productQuantity"]
            );
            array_push($productData, $product);
        }
    } else {
        // If there are no results, output an error message
        echo "0 results";
    }
}

// Close the database connection
$conn->close();

// Set the response header to indicate that the response is JSON
header('Content-Type: application/json');

// Encode the product data array as JSON and output it
echo json_encode($productData);
