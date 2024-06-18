<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Beqala</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="../Styles/PageStyles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>

<body>
  <?php include '../includes/navbar.php'; ?>

  <?php include '../includes/category.php'; ?>


  <div class="popularProduct">
    <h1 class="popTxt h-auto d-flex justify-content-lg-start justify-content-sm-center mx-lg-5 mx-sm-0">Milk and Dairy</h1>


    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="form-group">
            <label for="sort">Sort by:</label>
            <select id="sort" class="form-control">
              <option value="highToLow" class="choice" selected>Price (High to Low)</option>
              <option value="lowToHigh" class="choice">Price (Low to High)</option>
              <option value="name" class="choice">Name</option>
              <option value="date" class="choice">New</option>
            </select>
          </div>
        </div>
        <div class="col-lg-8 col-sm-6 ms-auto d-flex align-items-center">
          <input class="form-control me-2" type="search" id="search-bar" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success align-items-center" id="search-button" type="submit"><i class="fa fa-search mx-1"></i></button>
        </div>
      </div>
    </div>


    <div class="container-fluid items-container ms-auto">
      <div class="row productRow align-content-center justify-content-center milk-container">


      </div>
    </div>
  </div>
  <?php include '../includes/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="../Javascript/Search.js"></script>
  <script src="../Javascript/ItemPages.js"></script>
  <script src="../Javascript/Sorting.js"></script>
  <script src="../Javascript/AddCards.js"></script>
</body>

</html>