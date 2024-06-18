

function handleItemClick(event) {
  // Get the item element
  const item = event.target.closest('.itemDiv');
  
  // Retrieve the card data
  const name = item.querySelector('.itemName').textContent;
  const image = item.querySelector('img').src;
  const price = item.dataset.price;
  const category = item.querySelector('.category').textContent;
  const description = item.querySelector('.description').textContent;
const date=item.dataset.date;
const quantity=item.dataset.quantity;
const ID=item.dataset.ID;
  // Create a new item page with the retrieved data
  const newItemPage = `
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="UTF-8">
      <title>${name} - Item Page</title>
      <link rel="stylesheet" href="../Styles/itemPage.css">
      <link rel="stylesheet" href="../Styles/NavStyles.css">
      <link rel="stylesheet" href="../Styles/footer.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark py-sm-3" aria-label="NavBar">
    <div class="container-fluid">
      <a class="navbar-brand" href="HomePage.html"><img width="100px" height="55px" src="../assets/beqalaa.png" alt="beqala"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-list navbar-nav">
        <li class="nav-item">
            <a class="navbar-link nav-link" href="Categories.php">Categories</a>
          </li>
          <li class="nav-item">
            <a class="navbar-link nav-link" href="Contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="navbar-link nav-link" href="aboutUS.php">About</a>
          </li>
        </ul>
        <div class="nav-item dropdown ms-auto">
          <a class="navbar-link nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cart<i class="fa fa-shopping-cart"></i>
          </a><div class="dropdown-menu text-center ms-auto">
          <ul id="cart-items-container" class="menu p-0 text-center" aria-labelledby="navbarDropdown">
            <li class="emptytxt">Empty</li>
          </ul>
          <div class="order-last"></div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="card itemPage mb-3">
    <div class="itemDiv container-fluid d-flex flex-column align-items-center g-0" data-price="${price}" data-date="${date}" data-quantity="${quantity} data-id=${ID}">
      <div class="col-md-4 d-flex flex-column align-items-center g-0">
        <img id="image" src="${image}" class="card-img-top mt-3" alt="item image">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h1 class="card-subtitle item-price mb-2 text-muted text-center my-2" id="price">${price}EGP</h1>

          <h5 class="card-title itemName item-name text-center text-success" id="name">${name}</h5>
          <p class="card-text text-center item-description" id="description">${description}</p>
          <button class="btn add-to-cart-btn w-100 btn-lg cartAdd">Add to Cart</button>
          <h6 class="category text-black-50 ms-auto mt-3">Category: ${category}<span id="category"></span></h6>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="container-fluid under">
    <div class="leftSide">
      <p>&copy; Copyright Shokran. All Rights Reserved <br><br>

        Call: +02 01033501287 01033564782 02-27410570 <br>

        Location: 38th EL-kordy st , new fostat Cairo Egypt <br>
      </p>
    </div>
    <div class="rightSide mx-5">
      Email: <br>
      support@shokranegypt.com <br>
      sales@shokranegypt.com marketing@shokranegypt.com <br>
    </div>
  </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

  <script src="../Javascript/NavBar.js"></script>
    </body>
    </html>
  `;
  
  // Open a new window with the item page HTML
  const newItemPageWindow = window.open('', '_blank');
  newItemPageWindow.document.write(newItemPage);
}

// Add event listener to each item name
const itemNames = document.querySelectorAll('.itemName');
itemNames.forEach((itemName) => {
  itemName.addEventListener('click', handleItemClick);
});

$(document).ready(function() {
  $(document).on('click', '.itemName', handleItemClick);
});


