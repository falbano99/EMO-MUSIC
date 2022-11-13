<?php
	session_start();
	if(!isset($_SESSION["loggedin"])){
        header("location: signup_login.php");
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

  <link rel="stylesheet" href="./styles/style.css" />

  <title>EMO - MUSIC Web App</title>
</head>

<body>

  <!--NAVBAR-->
  <nav class="navbar navbar-dark fixed-top bg-dark">
		<div class="container-fluid navcontainer">
			<a class="navbar-brand brand-name" href="intro.php"><b>EMO - MUSIC</b>: Music for your Emotions</a>
			
			<div class="input-field button">
				<form action="/php/logout.php" style="display:contents">
         	<button type="submit" id="btn_logout" class="btn btn-outline-light">LOGOUT</button>
        </form>
    	</div>
		</div>
	</nav>


  <!--HEADER-->
  <section class="header py-5">
    <div class="container py-5">
      <div class="h-100 d-flex flex-column justify-content-center py-5">
        <div class="text-wrapper">
          <div class="text-inner">

            <!--TESTO + VERIFY-->
            <h1 class="display-5 text-white text-center">Put your helmet on and we'll make sure that it is worn
              correctly.
              The process will take about 10 seconds...</h1>
            </br>
            <h1 class="display-8 text-white text-center">Click on "Verify" to check the status of your helmet.</h1>
            </br>
            <div class="col text-center">
              <button type="button" id="verify" class="btn btn-bd-primary verify" onclick="isFinished()">Verify</button>
            </div>
            </br>
            
            <div>
              <!--PROGRESS BAR-->
              <div class="row">
                <div class="box col-4" id="box">
                  <div class="progress"></div>
                </div>
              </div>

              <!--MESSAGGIO-->
              <div class="messageBox" id="messageBox"></div>

              <!--PULSANTI-->
              <div class="row">
                <div class="divButtons">
                  <button type="button" class="btn btn-bd-primary tutorial" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    TUTORIAL
                  </button>
                  <button type="button" class="btn btn-bd-primary next" data-bs-toggle="modal" onclick="location.href = '/graph.php';" id="next" disabled>
                      NEXT
                  </button>
                </div>

                <!--CAROSELLO-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">TUTORIAL</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                          <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                              class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                              aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                              aria-label="Slide 3"></button>
                          </div>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img src="static/img1.jpg" class="d-block w-100" alt="First slide">
                            </div>
                            <div class="carousel-item">
                              <img src="static/img2.jpg" class="d-block w-100" alt="First slide">
                            </div>
                            <div class="carousel-item">
                              <img src="static/img3.jpg" class="d-block w-100" alt="First slide">
                            </div>
                          </div>
                          <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--scripts-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./script/TweenMax.min.js"></script>

  <script src="./script/progressBar.js"></script>
  <!--gestione transizioni-->
  <script src="./script/transition_signup_login.js"></script>
  
</body>

</html>