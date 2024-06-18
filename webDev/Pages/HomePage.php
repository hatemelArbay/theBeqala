<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Beqala</title>

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">

  <!-- Homepage CSS -->
  <link rel="stylesheet" href="../Styles/homepage.css">
  <link rel="stylesheet" href="../Styles/NavStyles.css">
  <link rel="stylesheet" href="../Styles/footer.css">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
  <?php include '../includes/navbar.php'; ?>


  <div class="container ss mx-auto">
    <div class="slideshow">
      <ul class="carousel">
        <h1 onclick="window.location.href='F&V.php'">Fresh Vegetables<br>Big Discount</h1>
        <li class="carousel-item active"><img src="../assets/slidePic1.png" class="d-block"></li>
        <li class="carousel-item active"><img src="../assets/slidePic2.png" class="d-block"></li>
      </ul>
    </div>

    <div class="rightContent my-5">
      <div class="secImg">
        <img src="../assets/banner-14-min.png">
        <h2>Every day Fresh & <br>clean with our product </h2>
        <button onclick="window.location.href='F&V.php'" class="btn btn-success">Shop Now <i class="fa fa-arrow-right"></i></button>

      </div>
      <div>
        <div class="secImg">
          <img src="../assets/banner-15-min.png">
          <h2>The best organic products online </h2>
          <button onclick="window.location.href='F&V.php'" class="btn btn-success">Shop Now <i class="fa fa-arrow-right"></i></button>

        </div>
      </div>
    </div>
  </div>

  <?php include '../includes/category.php'; ?>


  <div class="popularProduct">
    <h1 class="popTxt h-auto d-flex justify-content-lg-start justify-content-sm-center mx-lg-5 mx-sm-0">Popular Products</h1>
    <div class="container-fluid items-container ms-auto">
      <div class="row productRow popularProductsContainer align-content-center justify-content-center">


      </div>
    </div>
  </div>

  <?php include '../includes/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="../Javascript/slideshow.js"></script>
  <script src="../Javascript/ItemPages.js"></script>
  <script src="../Javascript/AddCards.js"></script>
</body>

</html>