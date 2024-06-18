$(document).ready(function() {
  $('#search-bar').on('keyup', function(e) {
    if (e.key === 'Enter') {
      handleSearch();
    }});
  $('#search-button').on('click', function(e) {
    e.preventDefault();
    handleSearch();
  });
  
function handleSearch() {
  let query = $('#search-bar').val().toLowerCase();
  $('.itemDiv').each(function() {
    let name = $(this).find('.itemName').text().toLowerCase();
    if (name.includes(query)) {
      $(this).show();
    } else {
      $(this).hide();
    }
  });
}
});