function processPaymentAndSendEmail(totalBill) {
  const paymentButton = document.getElementById('paymentBtnId');

  // Code to process the payment and send the email...
  console.log("in payment-button");
  console.log('Redirecting to homepage...');
  window.location.href = "../Pages/HomePage.php";

  // Display notification to the user
  if (window.Notification && Notification.permission === 'granted') {
    const notification = new Notification('Payment Success', {
      body: `Thank you for your payment of \nyou paid : $${totalBill}.`,
      icon: '../assets/banner-14-min.png'
    })
    notification.onclick = function() {
      window.focus();
      notification.close();
    
    };
  }
}
  document.addEventListener('DOMContentLoaded', function() {
    // Get the value of the 'totalBill' key from sessionStorage
    const totalBill = sessionStorage.getItem('totalBill');
  
    // Select the element that contains the {{totalBill}} placeholder
    const totalBillElement = document.querySelector('.total');
  
    // Replace the {{totalBill}} placeholder with the value from sessionStorage
    totalBillElement.textContent = totalBillElement.textContent.replace('{{totalBill}}', totalBill);
  });
  
  