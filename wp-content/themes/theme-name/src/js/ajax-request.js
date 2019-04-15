jQuery(function($) {
  get_posts_by_ajax($);
  getPagination($);
  $("#filter").on("change", function(e) {
    get_posts_by_ajax($);
    return false;
  });
});

function get_posts_by_ajax($) {
  var filter = $("#filter");
  //alert (filter.serialize());
  $.ajax({
    url: ajax_url.ajaxurl,
    data: filter.serialize(), // form data
    type: filter.attr("method"), // POST
    beforeSend: function(xhr) {
      //filter.find('button').text('Processing...'); // changing the button label
    },
    success: function(data) {
      //filter.find('button').text('Apply filter'); // changing the button label back
      $("#response").html(data); // insert data
      console.log(data);
    }
  });
}

function getPagination($) {
  $(document).on("click", ".page-numbers-container a", function(event) {
    event.preventDefault();
    var catFilter = $("#catFilter").val();
    var filter = $("#myFilter").val();
    var page = getPageNumber($(this));

    if ($(this).hasClass("prev")) {
      page = findCurrentPage($(this).parent());
      page = page - 1;
    }
    if ($(this).hasClass("next")) {
      page = findCurrentPage($(this).parent());
      page = page + 1;
    }

    $.ajax({
      url: ajax_url.ajaxurl,
      data: {
        categoryfilter: catFilter,
        action: filter,
        page: page
      },
      type: "post", // POST
      beforeSend: function(xhr) {
        //filter.find('button').text('Processing...'); // changing the button label
      },
      error: function(data) {
        console.log(data);
      },
      success: function(data) {
        //filter.find('button').text('Apply filter'); // changing the button label back
        $("#response").html(data); // insert data
        //console.log(data);
      }
    });
  });
}

function getPageNumber(element) {
  return parseInt(element.text());
}

function findCurrentPage(element) {
  var page = element.children("span").text();

  return parseInt(page);
}
