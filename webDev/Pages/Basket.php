<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart Page</title>
    <link rel="stylesheet" href="../Styles/PageStyles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
  <body>

  <?php include '../includes/navbar.php'; ?>

  <div class="container">
  <h1 class="mt-5 text-muted">Cart</h1>
  <table id="cart-table" class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Item</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <p id="total-bill"></p>
  <a href="payment.php" class="btn w-100 btn-lg checkout-btn">Checkout</a>
</div>

<?php include '../includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="../Javascript/Basket.js"></script>
    <script src="../Javascript/NavBar.js"></script>
  </body>
</html>
