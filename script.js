$(document).ready(function() {
  $('#category-form').submit(function(event) {
    event.preventDefault();
    var category = $('#category').val();
    $.ajax({
      url: 'get_articles.php',
      type: 'POST',
      data: { category: category },
      dataType: 'json',
      success: function(data) {
        var results = $('#results');
        results.empty();
        for (var i = 0; i < data.length; i++) {
          results.append('<h2>' + data[i].title + '</h2>');
          results.append('<p><a href="' + data[i].url + '">' + data[i].url + '</a></p>');
        }
      }
    });
  });
});
