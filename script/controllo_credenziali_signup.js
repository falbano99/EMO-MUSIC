var frm = $("#frm_signup");

frm.submit(function (e) {
  e.preventDefault();

  $.ajax({
    type: frm.attr("method"),
    url: frm.attr("action"),
    data: frm.serialize(),
    success: function (response) {
      if (response == "MANCA") alert("Check that the email is spelled correctly.");
      if (response == "ERRORE_CREDENZIALI") alert("Credentials already in use. Please, try again.");
      if (response == "ERRORE_PASSWORD") alert("Password do not match. Please, try again.");
      if(response == "OK") 
      {
        alert("Credentials OK. Redirect to login...");
        //window.location = "signup_login.html"
        window.location = "signup_login.php"
      }
	else console.log(response);
    },
    error: function (data) {
      console.log("An error occurred.");
      console.log(data);
    },
  });
});
