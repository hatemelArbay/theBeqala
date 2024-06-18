
$('.deleteButton').click(function() {
    console.log('Delete');
    var productID = $('input[name="productID"]').val();
    console.log(productID);
    // get the form data
    var formData = $('form').serialize();
    // make an AJAX request to delete the product from the database
    $.ajax({
      type: 'POST',
      url: '../data/deleteProduct.php',
      data: formData,
      success: function(response) {
        console.log(response);
        // reload the page to show the updated product list
        location.reload();
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
    console.log(formData);
    return false; // add this to prevent form submission from refreshing the page
  });
