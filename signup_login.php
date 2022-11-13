<?php
	session_start();
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==="True"){
        header("location: intro.php");
    }
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    
    <link rel="stylesheet" href="./styles/style.css" />
    
    <title>EMO - MUSIC Web App</title>
</head>

<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-dark fixed-top bg-dark">
        <div class="container-fluid navcontainer">
            <a class="navbar-brand brand-name" href="signup_login.php"><b>EMO - MUSIC</b>: Music for your Emotions
            </a>
        </div>
    </nav>
    <!--HEADER-->
    <section class="header py-5">
        <div class="container py-5">
            <div class="row">
                
                <!--TESTO-->
                <div class="col-md-6">
                    <div class="h-100 d-flex flex-column justify-content-center py-5">
                        <div>
                            <div class="text-wrapper">
                                <div class="text-inner">
                                    <h1 class="text-white">EMO - MUSIC <br /></h1>
                                    <h2 class="text-white">Music for your Emotions</h2>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="text-wrapper">
                                <div class="text-inner">
                                    <p></p>
                                    <p class="text-justify my-1 text-white">
                                        <b><i>Wear an EEG helmet. <br />
                                                I will recommend a song, based on the emotion you
                                                feel!</i></b>
                                        <br /><br />
                                        <b>EMO - MUSIC</b> is an intelligent platform capable of
                                        extracting emotions' features from people's brain by using
                                        a electronic helemet, made of 5 electrodes.
                                        <br />
                                        Thanks to this incredible new technology, an ad hoc Music
                                        Recommender System is able to suggest the best song choise
                                        for you, related to your emotional status.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--FORMS-->
                <div class="col-md-6">
                    <div class="h-100 d-flex flex-column justify-content-center py-5">
                        <div class="py-5 text-center form-container">
                            <div class="forms">

                                <!--FORM LOGIN-->
                                <div class="form login">
                                    <span class="text-white text-center formtype">Login</span>
                                    <form class="frm" id="frm" action="./php/login_ls.php" method="POST" class="text-white">
                                        <div class="input-field">
                                            <input type="text" name="email" id="email" placeholder="Enter your e-mail"
                                                value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" required />
                                            <i class="uil uil-envelope icon"></i>
                                        </div>
                                        <div class="input-field">
                                            <input type="password" name="password" id="password" class="password"
                                                placeholder="Enter your password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required />
                                            <i class="uil uil-lock icon"></i>
                                            <i class="uil uil-eye-slash showHidePw"></i>
                                        </div>
                                        <div class="checkbox-text">
                                            <div class="checkbox-content">
                                                <input type="checkbox" id="logCheck" name="logCheck" <?php if(isset($_COOKIE["email"])) echo "checked"; ?> />
                                                <label for="logCheck" class="text">Remember me</label>
                                            </div>
                                            <a href="forgotPSW_insertEmail.html" class="text">Forgot password?</a>
                                        </div>
                                        <div class="input-field button">
                                            <button type="submit" id="btn_submit"
                                                class="btn btn-bd-primary submitlogin">
                                                Start now
                                            </button>
                                        </div>
                                    </form>
                                    <div class="login-signup">
                                        <span class="text">Not a member?
                                            <a href="#" class="text signup-link">Signup now</a>
                                        </span>
                                    </div>
                                </div>

                                <!--FORM SIGNUP-->
                                <div class="form signup">
                                    <span class="text-white text-center formtype">Registration</span>

                                    <form class="frm_signup" id="frm_signup" action="./php/signup_ls.php" method="POST" class="text-white">
                                        <div class="input-field">
                                            <input type="text" name="nome" id="nome" placeholder="Enter your nickname"
                                                required />
                                            <i class="uil uil-user icon"></i>
                                        </div>

                                        <div class="input-field">
                                            <input type="text" placeholder="Enter your e-mail" required name="email"
                                                id="email" />
                                            <i class="uil uil-envelope icon"></i>
                                        </div>

                                        <div class="input-field">
                                            <input type="password" class="password" placeholder="Create your password"
                                                required name="password1" id="password1" />
                                            <i class="uil uil-lock icon"></i>
                                            <i class="uil uil-eye-slash showHidePw"></i>
                                        </div>

                                        <div class="input-field">
                                            <input type="password" class="password" placeholder="Confirm your password"
                                                required name="password2" id="password2" />
                                            <i class="uil uil-lock icon"></i>
                                        </div>

                                        <div class="checkbox-text">
                                            <div class="checkbox-content">
                                                <input type="checkbox" id="sigCheck" />
                                                <label for="sigCheck" class="text">Remember me</label>
                                            </div>
                                        </div>

                                        <!--<button onclick="controllo_signup(document.getElementById('nome').value, document.getElementById('email').value, document.getElementById('password1').value)" type="submit" id="btn_submit_signup" class="btn btn-bd-primary submitlogin">
											  Start now
											</button>-->
                                        <div class="input-field button">
                                            <button type="submit" id="btn_submit_signup"
                                                class="btn btn-bd-primary submitlogin">
                                                Start now
                                            </button>
                                        </div>
                                    </form>

                                    <div class="login-signup">
                                        <span class="text">Already member?
                                            <a href="#" class="text login-link">Login now</a>
                                        </span>
                                    </div>
                                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<BANNER COOKIE-->
    	<div class="cookie-container" id="cookie_div">
      		<p>We use cookies in this website to give you the best experience on our site. To find out more, read our <a href="info.html">Terms and Conditions</a> 
      		</p>
           	<button class="cookie-btn accept" onclick="accept()">
               	Accept
           	</button>
            <button class="cookie-btn reject" onclick="accept()">
               Reject
           	</button>
   	 	</div>
    </section>

    <!--scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./script/TweenMax.min.js"></script>

	<script src="./script/main.js"></script>
    <!--<script src="./script/controllo_credenziali_signup.js"></script>-->
    <script src="./script/controllo_credenziali_login.js"></script>
    <!--gestione transizioni-->
    <script src="./script/transition_signup_login.js"></script> 
    <!--gestione forms-->
    <script src="./script/scriptloginsignup.js"></script> 
	
    <script>
    	if(localStorage.getItem("bannerDisplayed")=="true") 
            	document.getElementById('cookie_div').style.display = 'none';
    
    	function accept() {
        	var cookieDiv = document.getElementById('cookie_div');
            console.log(localStorage.getItem("bannerDisplayed"))
            cookieDiv.style.display = 'none';
        }
        
    </script>


</body>

</html>