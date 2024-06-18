<!DOCTYPE html>
<html>

<head>

  <head>
    <title>sign up</title>
    <link rel="stylesheet" href="../Styles/PageStyles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  </head>
  <title>Signup</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body class="vh-100">
<?php include '../includes/navbar.php'; ?>
  <div class="container-fluid d-flex justify-content-center align-items-center my-auto h-100">
    <div class="card my-5 bg-light-subtle mt-5 px-5 py-2">
      <!-- Header -->
      <header class="my-4 text-center text-muted">
        <h1>Log in or create a new account.</h1>
      </header>

      <!-- Sign up Form -->
      <section class="row">
        <div class="col-md-6 col-sm-12 offset-md-3">
          <form method="post">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
            </div>
            <div class="form-group">
              <label for="userName">user name</label>
              <input type="text" class="form-control" id="userName" name="userName" placeholder="Your user name (used to login)">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="YourEmail@domain.com">
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="rehabCity-cairo">
            </div>
            <div class="form-group">
              <label for="phoneNum">Phone number</label>
              <input type="text" class="form-control" id="phoneNum" name="phoneNum" placeholder="01117766693">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="confirm">Confirm Password</label>
              <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Repeat Password">
            </div>
            <button type="submit" class="btn btn-success" name="create_account">Create Account</button>
            <p class="mt-3"><a class="text-success" href="./signIn.php">Already have an account?</a></p>
          </form>

        </div>

        <?php
        if (isset($_POST['create_account'])) {
          //echo "Form submitted!";
          $name = $_POST['name'];
          $email = $_POST['email'];
          $address = $_POST['address'];
          $password = $_POST['password'];
          $phoneNumber = $_POST['phoneNum'];
          $confirmPassword = $_POST['confirmpassword'];
          $userName = $_POST['userName'];
          if (empty($name) || empty($email) || empty($password) || empty($confirmPassword) || empty($phoneNumber) || empty($address)) {
            echo "<div class='alert alert-danger'>All fields are required.</div>";
          } else if (!is_numeric($phoneNumber) && strlen($phoneNumber) != 11) {
            echo "<div class='alert alert-danger'>Please enter a valid phone number.</div>";
          } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email)) {
              echo "<div class='alert alert-danger'>Please enter a valid email address</div>";
            } else {
              if ($password != $confirmPassword) {
                echo "<div class='alert alert-danger'>Passwords do not match.</div>";
              } else if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
                echo "<div class='alert alert-danger'>Name should only contain letters.</div>";
              } else {

                $user = 'root';
                $pass = '';
                $db = 'grocerydb';
                $conn = mysqli_connect('localhost', $user, $pass, $db);
                if (mysqli_connect_errno()) {
                  die("Failed to connect to MySQL: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM customer INNER JOIN user ON customer.userPID = user.userPID WHERE email='$email'";
                $result = $conn->query($sql);
                if ($result->num_rows == 0) {




                  $name = mysqli_real_escape_string($conn, $name);
                  $email = mysqli_real_escape_string($conn, $email);
                  $password = mysqli_real_escape_string($conn, $password);
                  $address = mysqli_real_escape_string($conn, $address);
                  $phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);
                  $userName = mysqli_real_escape_string($conn, $userName);

                  $sql = "insert into user (name,userName,pass,phoneNum,address,email)  VALUES ('$name','$userName','$password','$phoneNumber','$address','$email')";
                  mysqli_query($conn, $sql);

                  $getUserIDQuery = "SELECT userPID  FROM user WHERE userName = '$userName' AND name='$name' AND pass='$password' AND phoneNum='$phoneNumber' AND address='$address' AND email='$email';";
                  $UserIDResult = mysqli_query($conn, $getUserIDQuery);
                  $userIDRow = mysqli_fetch_assoc($UserIDResult);
                  $userID = $userIDRow['userPID'];
                  $SaveCustQuery = "INSERT INTO `customer` SET userPID=$userID";

                  if (mysqli_query($conn, $SaveCustQuery)) {
                    echo "<div class='alert alert-success'>Account created successfully.</div>";
                  } else {
                    echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
                  }
                } else {
                  echo "<div class='alert alert-danger'>the email already registered.</div>";
                }
              }
            }
          }
        }


        ?>

      </section>
    </div>
  </div>
  <?php include '../includes/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="../Javascript/NavBar.js"></script>
</body>

</html>