const quantitySelector = document.querySelector('.card-body');
const minusButton = quantitySelector.querySelector('.quantity-down');
const plusButton = quantitySelector.querySelector('.quantity-up');
const quantityInput = quantitySelector.querySelector('.quantity-input');

minusButton.addEventListener('click', () => {
  const currentValue = parseInt(quantityInput.value);
  if (currentValue > 1) {
    quantityInput.value = currentValue - 1;
  }
});

plusButton.addEventListener('click', () => {
  const currentValue = parseInt(quantityInput.value);
  quantityInput.value = currentValue + 1;
});
