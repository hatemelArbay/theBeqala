$('.saveButton').click(function() {
  var productID = $('input[name="productID"]').val();
  console.log(productID);
  // get the form data
  var formData = $('form').serialize();
  // make an AJAX request to update the product in the database
  $.ajax({
    type: 'POST',
    url: '../data/update-cards.php',
    data: formData,
    success: function(response) {
      console.log(response);
      // close the modal
      $('#editDialog').modal('hide');
      // reload the page to show the updated product
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });
  console.log(formData);
  return false; // add this to prevent form submission from refreshing the page
});
