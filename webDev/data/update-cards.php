<?php
if (isset($_SESSION["userPID"])) {
    // Check if the user is an admin
    if (isset($_SESSION["adminID"])){
        
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    // Get the product ID from the form
    $productID = $_POST['productID'];
    // Get the product data from the form
    $productName = $_POST['name'];
    $productDescription = $_POST['description'];
    $productCategory = $_POST['category'];
    $productPrice = $_POST['price'];
    $productQuantity = $_POST['productQuantity'];

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
    $sql = "UPDATE product SET productName='$productName', productDescription='$productDescription',
     productCategory='$productCategory', productPrice='$productPrice', productQuantity='$productQuantity' WHERE productID='$productID'";
    
    if (mysqli_query($conn, $sql)) {
      echo "Product updated successfully";
    } else {
      echo "Error updating product: " . mysqli_error($conn);
    }
    // Close the database connection
    mysqli_close($conn);
  }
    }
    // Check if the user is a customer
    elseif (isset($_SESSION["custID"])){
        header("Location: HomePage.php"); // Redirect to the homepage
    }
}