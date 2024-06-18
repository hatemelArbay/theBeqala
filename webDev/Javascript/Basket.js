const cartTableBody = document.querySelector('#cart-table tbody');
const totalBill = document.querySelector('#total-bill');

function loadFromCart() {
  const cart = JSON.parse(sessionStorage.getItem('cart')) || {};
  const cartItems = Object.keys(cart).map((itemName) => {
    const item = cart[itemName];
    return {
      itemName,
      itemPrice: item.price,
      itemQuantity: item.quantity,
    };
  });
  cartTableBody.innerHTML = '';
  let total = 0;
  cartItems.forEach((cartItem) => {
    console.log('cartItem', cartItem);
    const row = document.createElement('tr');
    const itemCell = document.createElement('td');
    const priceCell = document.createElement('td');
    const quantityCell = document.createElement('td');
    const totalCell = document.createElement('td');
    itemCell.textContent = cartItem.itemName;
    priceCell.textContent = cartItem.itemPrice +' EGP';
    quantityCell.textContent = cartItem.itemQuantity;
    const itemTotal = parseFloat(cartItem.itemPrice) * parseFloat(cartItem.itemQuantity);
    console.log('itemTotal', itemTotal);
    sessionStorage.setItem('totalBill',itemTotal);
    console.log(sessionStorage.getItem('totalBill'));
    total += itemTotal;
    totalCell.textContent = itemTotal.toFixed(2) + ' EGP';
 
    row.appendChild(itemCell);
    row.appendChild(priceCell);
    row.appendChild(quantityCell);
    row.appendChild(totalCell);
    cartTableBody.appendChild(row);
  });   
  totalBill.textContent = 'Total: ' + total.toFixed(2) + ' EGP';
  
}


document.addEventListener('DOMContentLoaded', function() {
  loadFromCart();
});
