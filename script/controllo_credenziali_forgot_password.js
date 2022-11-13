var frm = $("#frm");

frm.submit(function (e) {
  e.preventDefault();

  $.ajax({
    type: frm.attr("method"),
    url: frm.attr("action"),
    data: frm.serialize(),
    success: function (response) {
      if (response == "ERRORE") alert("Wrong credentials. Please, try again.");
      else window.location = "./insert_pin.html";
    },
    error: function (data) {
      console.log("An error occurred.");
      console.log(data);
    },
  });
});