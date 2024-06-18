<?php
// Get the user ID from the session
session_start();
if (isset($_SESSION['userPID'])) {
  $userID = $_SESSION['userPID'];
} else {
  // Redirect to login page if user is not logged in
  header('Location: login.php');
  exit;
}

// Get the cart data from the request body
$data = json_decode(file_get_contents('php://input'), true);

// Load the existing cart data from the Cart.json file
$cartData = json_decode(file_get_contents('../database/Cart.json'), true);

// Update the cart data for the current user
$cartData[$userID] = $data;

// Save the updated cart data to the Cart.json file
file_put_contents('../database/Cart.json', json_encode($cartData, JSON_PRETTY_PRINT));

// Return a success message
echo json_encode(['message' => 'Cart saved successfully']);
?>
