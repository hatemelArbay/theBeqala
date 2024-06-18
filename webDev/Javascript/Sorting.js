function sortItems(order) {
  const items = Array.from(document.querySelectorAll(".itemDiv"));
  
  if (order === "highToLow") {
    items.sort((a, b) => b.dataset.price - a.dataset.price);
  } else if (order === "lowToHigh") {
    items.sort((a, b) => a.dataset.price - b.dataset.price);
  } else if (order === "name") {
    items.sort((a, b) => a.querySelector(".itemName").textContent.localeCompare(b.querySelector(".itemName").textContent));
  } else if (order === "date") {
    items.sort((a, b) => new Date(b.dataset.date) - new Date(a.dataset.date));
  }
  
  const ul = document.querySelector(".productRow");
  for (const element of items) {
    ul.appendChild(element);
  }
}


// Sort by default (high to low)
sortItems("highToLow");

// Sort on change
document.querySelector("#sort").addEventListener("change", function() {
  const order = this.value;
  sortItems(order);
});
