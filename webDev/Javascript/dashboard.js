// Get all the tab links
const tabLinks = document.querySelectorAll('.nav-link');

// Get all the tab panes
const tabPanes = document.querySelectorAll('.tab-pane');

// Add click event listener to each tab link
tabLinks.forEach(tabLink => {
  tabLink.addEventListener('click', e => {
    e.preventDefault();

    // Remove 'active' class from previous tab link
    document.querySelector('.nav-link.active').classList.remove('active');

    // Add 'active' class to the clicked tab link
    tabLink.classList.add('active');

    // Hide current tab pane
    document.querySelector('.tab-pane.show.active').classList.remove('show', 'active');

    // Show the corresponding tab pane
    const targetPane = document.querySelector(tabLink.getAttribute('href'));
    targetPane.classList.add('show', 'active');
  });
});


//load date from DB 

function callPhpFile(url) {
  //console.log("tesPHOpCall");
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}

$(document).ready(function() {
  console.log("TEST JSON");
  callPhpFile("../data/getOrdersData.php");
});

function calculateTotalBill(prices, quantities) {
  let total = 0;
  for (let i = 0; i < prices.length; i++) {
    total += prices[i] * quantities[i];
  }
  return total;
}

function displayPendingOrders() {
  fetch('../data/orderData.json')
  .then(response => response.json())
  .then(data => {
    const orders = Object.values(data);

    // Filter the orders where isDelivered is 0
    const filteredOrders = orders.filter(order => order.isDelivered === "0");

    // Get the table body element
    let tableBody = document.querySelector('#pendingOrders tbody');

    // Loop through the filtered orders and create table rows
    filteredOrders.forEach(order => {
      let row = tableBody.insertRow();

      let nameCell = row.insertCell();
      nameCell.innerHTML = order.name;

      let emailCell = row.insertCell();
      emailCell.innerHTML = order.email;

      let productCell = row.insertCell();
      let productsWithQuantities = order.productNames.map((productName, i) => `${productName} x ${order.productQuantities[i]}`);
      productCell.innerHTML = productsWithQuantities.join("<br>");

      let productPriceCell = row.insertCell();
      let productPrices = order.productPrices.join("<br>");
      productPriceCell.innerHTML = productPrices;

      let phoneNumCell = row.insertCell();
      phoneNumCell.innerHTML = order.phoneNum;

      let addressCell = row.insertCell();
      addressCell.innerHTML = order.address;

      let totalBill = row.insertCell();
      let bill = calculateTotalBill(order.productPrices, order.productQuantities);
      totalBill.innerHTML = bill;

      let statusCell = row.insertCell();
      statusCell.innerHTML = "Pending";

      let deliveredCell = row.insertCell();
      deliveredCell.innerHTML = "<input type=\"checkbox\" style=\"margin-left: 29%;\" name=\"myCheckbox\" value=\"true\">";
   
  });

      // Get the "Save" button
      let saveButton = document.querySelector('.UpdateOrders');

      // Add an event listener to the "Save" button
      saveButton.addEventListener('click', function() {
        // Get all the rows in the table
        let rows = document.querySelectorAll('#pendingOrders tbody tr');

        // Create an array to store the email addresses
        let emailAddresses = [];

        // Loop through the rows
        rows.forEach(row => {
          // Get the checkbox in the row
          let checkbox = row.querySelector('input[type="checkbox"]');

          // Check if the checkbox is checked
          if (checkbox.checked) {
            // If the checkbox is checked, get the email in the row and push it into the emailAddresses array
            let email = row.querySelector('td:nth-child(2)').innerHTML;
            emailAddresses.push(email);
            row.remove();

          
          }
     
         
        });

      
    

      let url = `../data/updateOrderStatus.php?emails=${encodeURIComponent(emailAddresses.join(','))}`;
      
      fetch(url)
        .then(response => {
          if (response.ok) {
            return response.text();
          } else {
            throw new Error('Network response was not ok.');
          }
        })
        .then(data => {
          console.log(data);
          // Handle the response data
        })
        .catch(error => {
          console.error('Error fetching data: ', error);
        });
      
        callPhpFile("../data/getOrdersData.php");
        
        

        //end for callin g
      });
    })
    .catch(error => {
      console.error('Error fetching JSON data: ', error);
    });
}







$(document).ready(function() {
  console.log("testDAta");
  displayPendingOrders();
});


document.getElementById('v-pills-finishedOrders-tab').addEventListener('click', displayFinishedOrders);
function displayFinishedOrders() {
  console.log("test finishedOrders");
 
 callPhpFile("../data/getOrdersData.php");
  fetch('../data/orderData.json')
    .then(response => response.json())
    .then(data => {
      // Get all the orders from the data object
      const orders = Object.values(data);

      // Filter the orders where isDelivered is 1 (completed orders)
      const filteredOrders = orders.filter(order => order.isDelivered === "1");

      // Get the table body element for the finished orders table
      let tableBody = document.querySelector('#finishedOrders tbody');
      while (tableBody.rows.length > 0) {
        tableBody.deleteRow(0);
      }
      // Loop through the filtered orders and create table rows
      filteredOrders.forEach(order => {
        let row = tableBody.insertRow();

        let nameCell = row.insertCell();
        nameCell.innerHTML = order.name;

        let emailCell = row.insertCell();
        emailCell.innerHTML = order.email;

        let productCell = row.insertCell();
        let productsWithQuantities = order.productNames.map((productName, i) => `${productName} x ${order.productQuantities[i]}`);
        productCell.innerHTML = productsWithQuantities.join("<br>");

        let productPriceCell = row.insertCell();
        let productPrices = order.productPrices.join("<br>");
        productPriceCell.innerHTML = productPrices;

        let phoneNumCell = row.insertCell();
        phoneNumCell.innerHTML = order.phoneNum;

        let addressCell = row.insertCell();
        addressCell.innerHTML = order.address;

        let totalBillCell = row.insertCell();
        let bill = calculateTotalBill(order.productPrices, order.productQuantities);
        totalBillCell.innerHTML = bill;

        let statusCell = row.insertCell();
        statusCell.innerHTML = "Delivered";

      });
    });
}


// $(document).ready(function() {
//   console.log("testDAta");
//   displayFinishedOrders();
// });

//test for reload 


//noga 
const btn = document.querySelector('#v-pills-tbd3-tab');
const revenueHeading = document.querySelector('h1.revenue');

btn.addEventListener('click', function() {
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '../data/gelRevenue.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send('getRevenue=true');
  xhr.onload = function() {
    if (xhr.status === 200) {
      const revenue = xhr.responseText;
      revenueHeading.innerHTML = `<span style="text-align: center; display: block; margin-top:20%;"> <span style="color: green;">Revenue:</span> ${revenue+" EGP "}</span>`;



    } else {
      console.log('Error: ' + xhr.status);
    }
  };
});



