<!DOCTYPE html>
<html lang="html" class="vh-100">

<head>
  <title>dashboard</title>
  <link rel="stylesheet" href="../Styles/PageStyles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
  <?php include '../includes/navbar.php'; ?>

  <div class="row Rowz flex-lg-row flex-sm-column w-100">
    <div class="col-lg-3 col-sm-12">
      <nav class="nav tabs flex-lg-column flex-sm-row flex-sm-nowrap nav-pills" id="v-pills-tab" aria-label="dashtabs" role="tablist" aria-orientation="vertical">
        <a class="nav-link" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="false">Orders</a>
        <a class="nav-link active" id="v-pills-AddCard-tab" data-toggle="pill" href="#v-pills-AddCard" role="tab" aria-controls="v-pills-AddCard" aria-selected="false">Add Product</a>
        <a class="nav-link" id="v-pills-finishedOrders-tab" data-toggle="pill" href="#v-pills-finishedOrders" role="tab" aria-controls="v-pills-finishedOrders" aria-selected="false">Finished Orders</a>
        <a class="nav-link" id="v-pills-tbd3-tab" data-toggle="pill" href="#v-pills-tbd3" role="tab" name="Check_Revenue" aria-controls="v-pills-tbd3" aria-selected="false">TBD 3</a>

      </nav>
    </div>
    <div class="col-lg-9 col-sm-12">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
          <table aria-describedby="activeOrders" class="table" id="pendingOrders">
            <thead>
              <tr>
                <th>Customer Name</th>
                <th>Customer email</th>
                <th>Product name </th>
                <th>Product price </th>
                <th>Phone number</th>
                <th>Address</th>
                <th>Total Bill</th>
                <th>Status</th>
                <th>Delivered</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
          <!-- for if isDelevired is pressed-->
          <input type="submit" class="btn btn-primary UpdateOrders" name="updateDeliveredProducts" value="Save">


        </div>
        <div class="tab-pane fade show active" id="v-pills-AddCard" role="tabpanel" aria-labelledby="v-pills-AddCard-tab">

          <div id="add-card-form" class="card AddCardForm">
            <h2 class="card-header my-5">Add a New Card</h2>
            <form class="card-body" method="post" id="addProductForm" enctype="multipart/form-data">
              <div class="form-group">
                <label for="card-name" class="control-label">Product Name:</label>
                <input type="text" id="card-name" name="card-name" class="form-control">
              </div>

              <div class="form-group">
                <label for="card-image" class="control-label">Product Image :</label>
                <input type="file" id="card-image" name="card-image" class="form-control">
              </div>

              <div class="form-group">
                <label for="card-price" class="control-label">Product Price:</label>
                <input type="text" id="card-price" name="card-price" class="form-control">
              </div>

              <div class="form-group">
                <label for="card-category" class="control-label">Category:</label>
                <select id="card-category" name="categoriesOption" class="form-control">
                  <option name="" value="">Select a category</option>
                  <option name="Fruits" value="Fruits">Fruits</option>
                  <option name="Vegetables" value="Vegetables">Vegetables</option>
                  <option name="Milk" value="Milk">Milk</option>
                  <option name="Dairy" value="Dairy">Dairy</option>
                  <option name="Snacks" value="Snacks">Snacks</option>
                  <option name="Beverages" value="Beverages">Beverages</option>
                  <option name="Cereals" value="Cereals">Cereals</option>
                  <option name="Cereals" value="FrozenFood">FrozenFood</option>
                </select>
              </div>

              <div class="form-group">
                <label for="card-description" class="control-label">Description:</label>
                <textarea id="card-description" name="cardDescription" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label for="card-description" class="control-label">product Quantity:</label>
                <input type="number" id="card-description" name="quantity" class="form-control"></input>
              </div>

              <input type="submit" class="btn btn-primary addCardBtn" name="addProduct" value="Add Card">


              <?php
              if (isset($_POST['addProduct'])) {
                $productName = $_POST['card-name'];
                $produDescription = $_POST['cardDescription'];
                $productCategory = $_POST['categoriesOption'];
                $prouctPrice = $_POST['card-price'];
                $productQuantity = $_POST['quantity'];

                $photo = $_FILES['card-image']['tmp_name'];
                $photoType = pathinfo($_FILES['card-image']['name'], PATHINFO_EXTENSION);
                $photoName = $productName . '.' . $photoType;
                $photoPath = '../Uploads/' . $photoName;

                $currentDate = date('Y-m-d');



                $user = 'root';
                $pass = '';
                $db = 'grocerydb';
                $conn = mysqli_connect('localhost', $user, $pass, $db);
                if (mysqli_connect_errno()) {
                  die("Failed to connect to MySQL: " . mysqli_connect_error());
                }
                if (empty($productName) || empty($produDescription) || empty($productCategory) || empty($prouctPrice) || empty($productQuantity)) {

                  echo "<div class='alert alert-danger my-3 text-center'>Please fill all required fields.</div>";
                } else if (!is_numeric($prouctPrice) && ($prouctPrice > 0)) {
                  echo "<div class='alert alert-danger my-3 text-center'>Please enter a  product price.</div>";
                } else if ($productQuantity <= 0) {
                  echo "<div class='alert alert-danger my-3 text-center'>The product quantity should be bigger than 0.</div>";
                } else if ($prouctPrice <= 0) {
                  echo "<div class='alert alert-danger my-3 text-center'>The product price should be bigger than 0.</div>";
                } else if ($_FILES['card-image']['error'] === UPLOAD_ERR_NO_FILE) {
                  echo "<div class='alert alert-danger my-3 text-center'>Please upload the product image.</div>";
                } else {

                  $sqlCheckDuplicateProduct = "SELECT * FROM product WHERE product.productName='$productName';";
                  $result = $conn->query($sqlCheckDuplicateProduct);
                  if ($result->num_rows == 0) {
                    move_uploaded_file($photo, $photoPath);
                    $sql = "INSERT INTO `product` ( `productName`, `productDescription`, `productCategory`, `productPrice`, `productImg`, `productDate`, `productQuantity`) 
            VALUES ('$productName', '$produDescription', '$productCategory', '$prouctPrice', '$photoPath', '$currentDate', '$productQuantity');";

                    if (mysqli_query($conn, $sql)) {
                      echo "<div class='alert alert-success my-3 text-center'>Product added succesfully .</div>";
                    }
                  } else {
                    echo "<div class='alert alert-danger my-3 text-center'> No duplicate products allowed.";
                  }
                }
              }
              ?>
            </form>

          </div>
        </div>
        <div class="tab-pane fade" id="v-pills-finishedOrders" role="tabpanel" aria-labelledby="v-pills-finishedOrders-tab">
          <h3>Finished Orders</h3>
          <p>Here are the finished orders:</p>

          <table aria-describedby="activeOrders" class="table" id="finishedOrders">
            <thead>
              <tr>
                <th>Customer Name</th>
                <th>Customer email</th>
                <th>Product name </th>
                <th>Product price </th>
                <th>Phone number</th>
                <th>Address</th>
                <th>Total Bill</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane fade" id="v-pills-tbd3" role="tabpanel" aria-labelledby="v-pills-tbd3-tab">
        <h1 class="revenue"></h1>

      </div>
    </div>
  </div>
  </div>
  <?php include '../includes/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="../Javascript/dashboard.js"></script>
  <script src="../Javascript/AddCards.js"></script>
</body>

</html>