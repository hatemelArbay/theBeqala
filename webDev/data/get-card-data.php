<?php

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

// Query the database to retrieve the product data
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

// Create an array to store the product data
$productData = array();

if ($result->num_rows > 0) {
    // Loop through the query results and add each product to the array
    while ($row = $result->fetch_assoc()) {
      $product = array(
        "productID" => $row["productID"],
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
     echo "0 results";
  }
// Close the database connection
$conn->close();

// Send the product data as a JSON response
header('Content-Type: application/json');
echo json_encode($productData);

