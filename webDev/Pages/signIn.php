<!DOCTYPE html>
<html>
<head>
  <head>
    <title>sign in</title>
    <link rel="stylesheet" href="../Styles/PageStyles.css">
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  </head>
    <title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body class="vh-100">
<?php include_once '../includes/navbar.php'; ?>
  <div class="container-fluid d-flex justify-content-center align-items-center my-auto h-100">
    <div class="card bg-light-subtle my-5 px-5 py-2">
    <!-- Header -->
    <header class="my-4 text-center text-muted">
      <h1>Log in or create a new account.</h1>
    </header>

   <!-- Sign In Form -->
<section class="row">
  <div class="col-md-6 offset-md-3">
    <form method="post">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="EmailAddress">
        <div class="invalid-feedback">Please enter a valid email address.</div>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="UserPassword">
      </div>
      <button type="submit" class="btn btn-success" name="signIn">Sign In</button>
      <p class="mt-3">Don't have an account? <a class="text-success" href="../Pages/signUp.php">Sign up here.</a></p>
    </form>
  </div>
</section>
<?php
require_once('../data/session.php');
?>
</div>
  </div>
  <?php include '../includes/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="../Javascript/NavBar.js"></script>
</body>
</html>