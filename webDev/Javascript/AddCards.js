// let today = new Date();
// let dd = String(today.getDate()).padStart(2, '0');
// let mm = String(today.getMonth() + 1).padStart(2, '0');
// let yyyy = today.getFullYear();

document.addEventListener('DOMContentLoaded', function () {
  addCards()
  addPopularProductCards()
    .then(function () {
      console.log('Cards added successfully');
      // Call the NavBar.js script here
      const script = document.createElement('script');
      script.src = '../Javascript/NavBar.js';
      document.head.appendChild(script);

      const script2 = document.createElement('script');
      script2.src = '../Javascript/EditCards.js';
      document.head.appendChild(script2);
      console.log(script);
      const script3 = document.createElement('script');
      script3.src = '../Javascript/deleteProduct.js';
      document.head.appendChild(script3);
    })
    .catch(function () {
      console.error('Failed to add cards');
    });
});






function addCards(){
  return new Promise(function(resolve, reject) {
console.log("nerd");

const xhr = new XMLHttpRequest();
xhr.open('GET', '../data/get-card-data.php');
xhr.onload = function() {
  if (xhr.status === 200) {
    const cardData = JSON.parse(xhr.responseText);
    for (const element of cardData) {
      const ID=element.productID;
      const name = element.name;
      const image = element.image;
      const price = element.price;
      const category = element.category;
      const description = element.description;
      const quantity = element.quantity;
      const date = element.date;
       let cardContainer;
       switch (category) {
         case 'Fruits':
           cardContainer = document.querySelector('.fruits-container');
           break;
         case 'Vegetables':
           cardContainer = document.querySelector('.vegetables-container');
           break;
         case 'Milk':
           cardContainer = document.querySelector('.milk-container');
           break;
         case 'Dairy':
           cardContainer = document.querySelector('.dairy-container');
           break;
         case 'Snacks':
           cardContainer = document.querySelector('.snacks-container');
           break;
         case 'Beverages':
           cardContainer = document.querySelector('.beverages-container');
           break;
         case 'Cereals':
           cardContainer = document.querySelector('.cereals-container');
           break;
           case 'FrozenFood':
            cardContainer = document.querySelector('.frozenFood-container');
          break;    
       }

       const newCard = `
       <div class="itemDiv col-xxl-3 col-xl-4 col-md-6 col-sm-9 mb-4 px-sm-1" data-price="${price}" data-date="${date}" data-quantity="${quantity} data-id=${ID}">
       <div class="card item">
       <div id="editBtnContainer"></div>
         <img class="img-fluid" href="#" src="${image}">
         <h4 class="category">${category}</h4>
         <h4 class="itemName">${name}</h4>
         <div class="containerItem">
           <h4 class="description" hidden>${description}</h4>
           <div class="price">
             <h4>${price} EGP</h4>
           </div>
           
           <div class="add-to-cart-btn">
             <button class="cartAdd btn btn-outline-success"><i class="fa fa-shopping-cart"></i> Add</button>
           </div>
         </div>
       </div>
       </div>
   
       <div class="modal fade" id="editDialog" tabindex="-1" role="dialog" aria-labelledby="editDialogLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
         <form method="POST">
         <div class="modal-header">
             <h5 class="modal-title" id="editDialogLabel">Edit Dialog</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
             <input type="hidden" name="productID" value="${ID}">
             <label for="category">Category:</label>
             <input type="text" id="category" name="category" value="${category}" class="form-control"><br>
             <label for="name">Name:</label>
             <input type="text" id="name" name="name" value="${name}" class="form-control"><br>
             <label for="description">Description:</label>
             <textarea id="description" name="description" class="form-control">${description}</textarea><br>
             <label for="price">Price:</label>
             <input type="text" id="price" name="price" value="${price}" class="form-control"><br>
             <label for="quantity">Quantity:</label>
             <input type="text" id="quantity" name="productQuantity" value="${quantity}" class="form-control"><br>
         </div>
         <div class="modal-footer">
             <button type="submit" class="btn btn-success saveButton" onclick="$('#editDialog').modal('hide')">Save</button>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
         </div>
     </form>
         </div>
       </div>
     </div>
       `;
   console.log(ID)
    if (cardContainer) {
      cardContainer.innerHTML += newCard;
    } else {
      console.log(cardContainer);
      console.error('Could not find card container');
    }
    }
    resolve();
  }
  else{
    reject();
  }
};
xhr.send();
});
}
function addPopularProductCards() {
  return new Promise(function (resolve, reject) {
    console.log("addPopularProductCards");

    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../data/getPopularProduct.php');
    xhr.onload = function () {
      if (xhr.status === 200) {
        const cardData = JSON.parse(xhr.responseText);
        for (const element of cardData) {
          const name = element.name;
          const image = element.image;
          const price = element.price;
          const category = element.category;
          const description = element.description;
          const quantity = element.quantity;
          const date = element.date;

          let cardContainer = document.querySelector('.popularProductsContainer');


          const newCard = `
    <div class="itemDiv col-xxl-3 col-xl-4 col-md-6 col-sm-9 mb-4 px-sm-1" data-price="${price}" data-date="${date}" data-quantity="${quantity}">
    <div class="card item">
    <button class="delete-btn btn btn-link" hidden >Delete</button>
    <button class="edit-btn btn btn-link" hidden >Edit</button>
      <img class="img-fluid" href="#" src="${image}">
      <h4 class="category">${category}</h4>
      <h4 class="itemName">${name}</h4>
      <div class="containerItem">
        <h4 class="description" hidden>${description}</h4>
        <div class="price">
          <h4>${price} EGP</h4>
        </div>
        <div class="add-to-cart-btn">
          <button class="cartAdd btn btn-outline-success"><i class="fa fa-shopping-cart"></i> Add</button>
        </div>
      </div>
    </div>
    </div>
    `;

          if (cardContainer) {
            cardContainer.innerHTML += newCard;
          } else {
            console.log(cardContainer);
            console.error('Could not find card container');
          }
        }
        resolve();
      }
      else {
        reject();
      }
    };
    xhr.send();
  });
}