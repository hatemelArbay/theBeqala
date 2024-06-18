// Initialize the dropdown
const dropdown = new bootstrap.Dropdown(document.querySelector('.dropdown'), {
  toggle: '.navbar-link'
});
const cartItemsContainer = document.querySelector('#cart-items-container');
const cartButtons = document.querySelectorAll('.cartAdd');
let cart={};
  // Load the cart from local storage if available
  if (sessionStorage.getItem('cart')) {
    cart = JSON.parse(sessionStorage.getItem('cart'));
    updateCartUI();
  }
  // Add event listeners to cart buttons
  cartButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
      const itemDiv = event.target.closest('.itemDiv');
      const itemName = itemDiv.querySelector('.itemName').textContent;
      const itemPrice = parseFloat(itemDiv.dataset.price);
      const itemQuantity = parseInt(itemDiv.dataset.quantity);
      
      if (cart[itemName]) {
        if (cart[itemName].quantity < itemQuantity) {
          cart[itemName].quantity += 1;
        } else {
          alert("You cannot add more than the available quantity.");
        }
      } else {
        cart[itemName] = { price: itemPrice, quantity: 1 };
      }
  
      // Save the cart to local storage
      sessionStorage.setItem('cart', JSON.stringify(cart));
  
      updateCartUI();
    });
  });
  
  function updateCartUI() {
    cartItemsContainer.innerHTML = '';
    let totalPrice = 0;
  
    for (let itemName in cart) {
      const item = cart[itemName];
      const itemPrice = item.price;
      const itemQuantity = item.quantity;
  
      const li = document.createElement('li');
      li.classList.add('quantity');
      li.innerHTML = `${itemQuantity}x ${itemName}<br>${itemPrice} EGP<br>`;
      
      const removeBtn = document.createElement('button');
      removeBtn.classList.add('removeItemBtn', 'btn', 'btn-danger', 'btn-sm');
      removeBtn.textContent = 'Remove';
      removeBtn.addEventListener('click', function() {
        delete cart[itemName];
        sessionStorage.setItem('cart', JSON.stringify(cart));
        updateCartUI();
      });
      li.appendChild(removeBtn);
  
      cartItemsContainer.appendChild(li);
      totalPrice += itemPrice * itemQuantity;
    }
  
    const hr = document.createElement('hr');
    cartItemsContainer.appendChild(hr);
  
    const total = document.createElement('p');
    total.classList.add('font-weight-bold');
    total.textContent = `Total: ${totalPrice} EGP`;
    cartItemsContainer.appendChild(total);
  }
  
  const viewBasketBtn = document.createElement('button');
  viewBasketBtn.id = 'view-basket-btn';
  viewBasketBtn.classList.add('btn', 'btn-success');
  viewBasketBtn.textContent = 'View Basket';
  document.querySelector('.order-last').appendChild(viewBasketBtn);
  viewBasketBtn.addEventListener('click', function() {
    window.location.href = 'Basket.php';
  });
