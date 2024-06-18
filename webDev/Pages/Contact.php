<!DOCTYPE html>
<html>

<head>
  <title>Contact Us</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../Styles/PageStyles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
<?php include '../includes/navbar.php'; ?>

  <div class="container-fluid my-auto h-100">
    <h1 class="text-center py-4 text-success">Contact Us</h1>
    <h5 class="text-muted text-center"> write us an email!</h5>
    <div class="row justify-content-center">
      <div class="card contact p-4 col-md-6">
        <form>
          <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="Enter your name">
          </div>
          <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Enter your email">
          </div>
          <div class="form-group">
            <label for="inputMessage">Message</label>
            <textarea class="form-control" id="inputMessage" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn sub m-4 px-5 btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>

<?php include '../includes/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="../Javascript/NavBar.js"></script>
</body>

</html>