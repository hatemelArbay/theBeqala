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

// Load the cart data from the Cart.json file
$cartData = json_decode(file_get_contents('../database/Cart.json'), true);

// Retrieve the cart data for the current user
if (isset($cartData[$userID])) {
  $cart = $cartData[$userID];
} else {
  $cart = [];
}

// Return the cart data as JSON
echo json_encode($cart);
