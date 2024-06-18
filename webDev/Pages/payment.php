<?php
// Start the session
session_start();

// Get the user ID from the session
if (isset($_SESSION['userPID'])) {
  $userID = $_SESSION['userPID'];
} else {
  // Redirect to login page if user is not logged in
  header('Location: signIn.php');
  exit;
}
// Retrieve the cart data for the current user from the session
// $cart = $_SESSION['cart'];
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grocerydb";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submitPayment"])) {
  // Get the payment data from the form
  $paymentID = $_POST['paymentID'];
  $cardNumber = $_POST['cardNumber'];
  $cardName = $_POST['cardName'];
  $expDate = $_POST['expDate'];
  $cvv = $_POST['cvv'];
  $customerID = $_SESSION['userPID'];
  // Validate the payment data

  if (empty($cardNumber)) {
    echo "<div class='alert alert-danger'>Card number is required.</div>";
  } elseif (!preg_match('/^[0-9]{16}$/', $cardNumber)) {
    echo "<div class='alert alert-danger'>invalid card number .</div>";
  } elseif (empty($cardName)) {
    echo "<div class='alert alert-danger'>Card name is required</div>";
  } elseif (!preg_match("/^(0[1-9]|1[0-2])\/([0-9]{2})$/", $expDate)) {
    echo "<div class='alert alert-danger'>Expiry date should be in the format MM/YY";

    $expiryMonthYear = explode("/", $expDate);
    $expiryMonth = $expiryMonthYear[0];
    $expiryYear = $expiryMonthYear[1];
    $currentYear = date("y");
    $currentMonth = date("m");
  }
  //Check if the card is still valid


  elseif ($expiryYear < $currentYear || ($expiryYear == $currentYear && $expiryMonth < $currentMonth)) {
    echo "<div class='alert alert-danger'>your card is expired";
  } elseif (empty($cvv)) {
    echo "<div class='alert alert-danger'>CVV is required</div>";
  } elseif (!preg_match('/^\d{3}$/', $cvv)) {
    // CVV is invalid
    echo "<div class='alert alert-danger'>Invalid CVV</div>";
  } elseif (!preg_match('/^[0-9]{3}$/', $cvv)) {
    echo "<div class='alert alert-danger'>Invalid CVV</div>";
  } else {
    // Calculate the total bill
    echo "<div class='alert alert-success'>Proceed to payment Successfully!</div>";
    //Calculate the total bill from the cart data in the session
    echo '<script src="../Javascript/payment.js"></script>';
    echo '<script>';
    $totalBill = 200;
    echo 'processPaymentAndSendEmail(' . json_encode($totalBill) . ');';
    echo '</script>';
    // header('Location: HomePage.php');



    // Connect to the database
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO payment ( cardNumber, cardName, expDate, cvv, totalBill, custID) VALUES ('$cardNumber','$cardName',  '$expDate','000', '$totalBill','$customerID)'";
    if ($conn->query($sql) === true) {
      //echo "Payment successful!";
      //call js function


    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Clear the cart data for the current user from the session
    unset($_SESSION['cart']);
    // Redirect to the homepage
    // header('Location: HomePage.php');

    exit;
  }
}
// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="../Styles/AboutUs.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <title>Payment form</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="mx-auto text-center">
          <h1>Payment Form</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="contanier-fluid ">
    <div class="row">

      <div class=".col-sm-11 .col-md-10 col-8  mx-auto">

        <div class="paymentForm">
          <div class="paymentTitle">


            <div class="form col-12 ">

              <form class="mb-5" method="post">
                <div class="mb-3 ">
                  <label class="form-label">Card number</label>
                  <input placeholder="1234 4565 1235 4895" type="text" class="form-control" name="cardNumber" id="cardNumber" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                  <label class="form-label">Name on card</label>
                  <input placeholder="EX. Hatem mohamed" type="text" class="form-control" name="cardName" id="carHolderName" aria-describedby="emailHelp">

                </div>

                <div class="cvv d-flex ">
                  <div class="mb-3 col me-4">
                    <label class="form-label">Expiry date</label>
                    <input type="text" class="form-control" type="text" id="expDate" name="expDate" placeholder="MM/YY" aria-describedby="emailHelp">

                  </div>
                  <div class="mb-3 col">
                    <label for="exampleInputPassword1" class="form-label">Security code </label>
                    <input placeholder="***" type="password" id="cvv" name="cvv" class="form-control">
                  </div>
                </div>
                <div class="bill">
                  <p class="d-block total">Total Bill : 80 EGP</p>
                  <!-- <p class="d-block total">Total Bill : {{totalBill}} EGP</p> -->
                </div>



                <div class="d-grid">
                  <button type="submit" onclick="submitFUn()" type="submit" name="submitPayment" id="paymentBtnId" value="Submit Payment">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <footer>
        <div class="under">
          <div class="leftSide">
            <p>&copy; Copyright Shokran. All Rights Reserved <br><br>

              Call: +02 01033501287 01033564782 02-27410570 <br>

              Location: 38th EL-kordy st , new fostat Cairo Egypt <br>
            </p>
          </div>
          <div class="rightSide">
            Email: <br>
            support@shokranegypt.com <br>
            sales@shokranegypt.com marketing@shokranegypt.com <br>
          </div>
        </div>
      </footer>
      <script src="../Javascript/payment.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>