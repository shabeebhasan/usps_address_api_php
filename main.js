
$("#address-form").submit(function (e) {

  $('#save-modal').modal('toggle');
  $("#address_description_orignal").html("")
  $("#address_description_usps").html("")
  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var actionUrl = form.attr('action');
  console.log("actionUrl:", actionUrl)
  console.log("data:", form.serialize())
  $.ajax({
    type: "POST",
    url: actionUrl,
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      let jsonData = JSON.parse(data);
      console.log(jsonData);
      window.originalData = jsonData.original;
      window.standarizedData = jsonData.validate_result;
      let originalHtml = "Address Line 1: " + window.originalData.address_line_1 + '\n'
        + "Address Line 2: " + window.originalData.address_line_2 + '\n'
        + "City: " + window.originalData.city + '\n'
        + "State: " + window.originalData.state + '\n'
        + "Zipcode: " + window.originalData.zipcode;
      let standarizedDataHtml = "Address Line 1: " + window.standarizedData?.Address?.Address1 + '\n'
        + "Address Line 2: " + window.standarizedData?.Address?.Address2 + '\n'
        + "City: " + window.standarizedData?.Address?.City+ '\n'
        + "State: " + window.standarizedData?.Address?.State + '\n'
        + "Zipcode: " + window.standarizedData?.Address?.Zip5;
      if (window.standarizedData?.Address?.Error?.Description) {
        standarizedDataHtml = window.standarizedData.Address.Error.Description;
      }
      $("#address_description_orignal").html(originalHtml)
      $("#address_description_usps").html(standarizedDataHtml)
    },
    error: function (data) {
      console.log('An error occurred.');
      console.log(data);
    },
  });

});

$('#originalBtn').click(function () {
  $('.btn-toggle').find('.btn').toggleClass('btn-success');
  console.log($(this))
  $("#address_description_usps").addClass("collapse");
  $("#address_description_orignal").removeClass("collapse");
});
$('#stBtn').click(function () {
  $('.btn-toggle').find('.btn').toggleClass('btn-success');
  console.log($(this))
  $("#address_description_usps").removeClass("collapse");
  $("#address_description_orignal").addClass("collapse");
});
