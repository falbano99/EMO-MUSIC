var frm = $("#frm");
var frmSignup = $("#frm_signup");

frm.submit(function (e) {
  e.preventDefault();

  $.ajax({
    type: frm.attr("method"),
    url: frm.attr("action"),
    data: frm.serialize(),
    success: function (data) {
      if (data == "ERRORE") alert("Wrong credentials. Please, try again.");
      else if (data == "MANCA") alert("Check that the email is spelled correctly.");
      else window.location = "./intro.php";
    },
    error: function (data) {
      console.log("An error occurred.");
      console.log(data);
    },
  });
});

frmSignup.submit(function(e) {
	e.preventDefault();
    $.ajax({
    	type: frmSignup.attr("method"),
        url: frmSignup.attr("action"),
        data: frmSignup.serialize(),
        success: function (data){
        	if (data=="ERRORE_CREDENZIALI") alert("Credentials already in use. Please, try again.");
            if (data == "ERRORE_PASSWORD") alert("Password do not match. Please, try again.");
            if(data == "OK") {
            	alert("Credentials OK. Redirect to login...");
                window.location = "signup_login.php";
            }
        },
        errore: function (data){
        	console.log("An error occurred.");
      		console.log(data);
        },
    });
});

